<?php

use Serwisant\SerwisantApi;

$loader = require __DIR__ . '/../vendor/autoload.php';

function c_header($ns, $name, $ext)
{
  $content = "<?php\n\n";
  $content .= "namespace Serwisant\SerwisantApi\Types" . '\\' . $ns . ";\n\n";
  $content .= "use Serwisant\SerwisantApi;\n";
  $content .= "use Serwisant\SerwisantApi\Types;\n\n";
  $content .= "class {$name} extends Types" . '\\' . $ext . "\n";
  $content .= "{\n";
  return $content;
}

function c_footer($ns)
{
  $content = '';
  $content .= "  protected function schemaNamespace()\n";
  $content .= "  {\n";
  $content .= "    return '{$ns}';\n";
  $content .= "  }\n";
  $content .= "}";
  return $content;
}

function c_detect_name($type, $for)
{
  if (!$type) {
    return '';
  }
  $map = [
    'Boolean' => 'bool',
    'String' => 'string',
    'Float' => 'float',
    'Int' => 'int',
    'Date' => 'string',
    'HashID' => 'string'
  ];
  if ($type['name']) {
    $t_name = $type['name'];
  } else {
    $t_name = c_detect_name($type['ofType'], $for);
  }
  if (array_key_exists($t_name, $map)) {
    $out = $map[$t_name];
  } else {
    $out = $t_name;
  }
  if ($type['kind'] == 'LIST') {
    if ($for == 'comment') {
      return "{$out}[]";
    }
    if ($for == 'arg') {
      return 'array'; // this is an array od types, PHP nas no such type hinting, it will be an array
    }
  } elseif ($type['kind'] == 'ENUM') {
    return 'string';  // ENUM is not class - it's a String
  } else {
    return $out;
  }
}

function c_detect_null($type)
{
  if (!$type) {
    return 'null';
  }
  if ($type['kind'] == 'NON_NULL') {
    return false;
  } elseif ($type['kind'] == 'LIST') {
    return 'array()';
  } else {
    return c_detect_null($type['ofType']);
  }
}

function c_prop_comment($type, $description)
{
  $content = "  /**\n";
  if ($type) {
    $content .= "   * @var " . c_detect_name($type, 'comment') . "\n";
  }
  if ($description) {
    $content .= "   * " . $description . "\n";
  }
  $content .= "  */\n";
  return $content;
}

function c_func_comment($type_args, $type_return, $description)
{
  $content = "  /**\n";
  if ($description) {
    $content .= "   * " . $description . "\n";
  }
  foreach ($type_args as $type_arg) {
    $content .= "   * @param {$type_arg}\n";
  }
  $content .= "   * @return {$type_return}\n";
  $content .= "   */\n";
  return $content;
}

function build_enum($ns, $typedef)
{
  $content = c_header($ns, $typedef['name'], 'Enum');
  foreach ($typedef['enumValues'] as $enum) {
    $content .= c_prop_comment('', $enum['description']);
    $content .= "  const {$enum['name']} = '{$enum['name']}';\n\n";
  }
  $content .= c_footer($ns);
  return $content;
}

function build_root_type_method($field)
{
  $type_args_comment = [];
  $type_args_not_null = [];
  $type_args_null = [];
  $type_args_call = [];
  foreach ($field['args'] as $arg) {
    $null = c_detect_null($arg['type']);
    $type_args_comment[] = c_detect_name($arg['type'], 'comment') . ' $' . $arg['name'];
    if ($null) {
      $type_args_null[] = c_detect_name($arg['type'], 'arg') . ' $' . $arg['name'] . ' = ' . $null;
    } else {
      $type_args_not_null[] = c_detect_name($arg['type'], 'arg') . ' $' . $arg['name'];
    }
    $type_args_call[] = "'" . $arg['name'] . "' => " . '$' . $arg['name'];
  }
  $func_args = join(', ', array_merge($type_args_not_null, $type_args_null));
  $extra_args = (strlen(trim($func_args)) > 0 ? ', ' : '') . '$vars = array()';
  $content = '';
  $content .= c_func_comment($type_args_comment, c_detect_name($field['type'], 'comment'), $field['description']);
  $content .= "  public function {$field['name']}(" . $func_args . $extra_args . ")\n";
  $content .= "  {\n";
  $content .= '     return $this->inputArgs(' . "'{$field['name']}'" . ', array_merge($vars, [' . join(', ', $type_args_call) . "]));\n";
  $content .= "  }\n\n";
  return $content;
}

function build_object($ns, $typedef)
{
  if (false !== stripos($typedef['name'], 'query') || false !== stripos($typedef['name'], 'mutation')) {
    $content = c_header($ns, $typedef['name'], 'RootType');
  } else {
    $content = c_header($ns, $typedef['name'], 'Type');
  }
  foreach ($typedef['fields'] as $field) {
    if ($field['type']['kind'] == 'LIST') {
      // to jest tablica, niech ma domyślną pustą postać
      $content .= c_prop_comment($field['type'], $field['description']);
      $content .= "  public \${$field['name']} = [];\n";
    } elseif (false !== stripos($typedef['name'], 'query') || false !== stripos($typedef['name'], 'mutation')) {
      $content .= build_root_type_method($field);
    } else {
      $content .= c_prop_comment($field['type'], $field['description']);
      $content .= "  public \${$field['name']};\n\n";
    }
  }
  $content .= c_footer($ns);
  return $content;
}

function build_input($ns, $typedef)
{
  $content = c_header($ns, $typedef['name'], 'Type');
  foreach ($typedef['inputFields'] as $field) {
    if ($field['type']['kind'] == 'LIST') {
      // to jest tablica, niech ma domyślną pustą postać
      $content .= c_prop_comment($field['type'], $field['description']);
      $content .= "  public \${$field['name']} = [];\n";
    } else {
      $content .= c_prop_comment($field['type'], $field['description']);
      $content .= "  public \${$field['name']};\n\n";
    }
  }
  $content .= c_footer($ns);
  return $content;
}


$client = new SerwisantApi\GraphqlClient();
$schemas = [
  SerwisantApi\Types\RootType::SCHEMA_INTERNAL => 'internal',
  SerwisantApi\Types\RootType::SCHEMA_PUBLIC => 'public',
  SerwisantApi\Types\RootType::SCHEMA_SERVICE => 'service',
  SerwisantApi\Types\RootType::SCHEMA_CUSTOMER => 'customer',
  SerwisantApi\Types\RootType::SCHEMA_MOBILE => 'mobile',
];

foreach ($schemas as $ns => $schema_path) {
  $classes_dir = __DIR__ . "/../src/Serwisant/SerwisantApi/Types/{$ns}";
  if (!file_exists($classes_dir)) {
    mkdir($classes_dir);
  }
  $request = new SerwisantApi\GraphqlRequest($client, $schema_path, $ns);
  foreach ($request->introspection()['types'] as $typedef) {
    $filename = null;
    $content = null;

    // ignore internal types
    if (substr($typedef['name'], 0, 2) == '__') {
      continue;
    }
    switch ($typedef['kind']) {
      case 'ENUM':
        $filename = $typedef['name'];
        $content = build_enum($ns, $typedef);
        break;
      case 'OBJECT':
        $filename = $typedef['name'];
        $content = build_object($ns, $typedef);
        break;
      case 'INPUT_OBJECT':
        $filename = $typedef['name'];
        $content = build_input($ns, $typedef);
        break;
      default:
        # nic
    }
    if ($filename && $content) {
      file_put_contents("{$classes_dir}/{$filename}.php", $content);
    }
  }
}
