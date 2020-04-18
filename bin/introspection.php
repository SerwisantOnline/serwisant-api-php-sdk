<?php

use Serwisant\SerwisantApi\Graphql;
use Serwisant\SerwisantApi\SchemaInternal;
use Serwisant\SerwisantApi\SchemaPublic;
use Serwisant\SerwisantApi\SchemaService;

$loader = require __DIR__ . '/../vendor/autoload.php';

function c_header($ns, $name, $ext)
{
  $content = "<?php\n\n";
  $content .= "namespace Serwisant\SerwisantApi\Types" . '\\' . $ns . ";\n\n";
  $content .= "use Serwisant\SerwisantApi\Types;\n\n";
  $content .= "class {$name} extends Types" . '\\' . $ext . "\n";
  $content .= "{\n";
  return $content;
}

function c_detect_name($type)
{
  $map = [
    'Boolean' => 'bool',
    'String' => 'string',
    'Float' => 'float',
    'Date' => 'string'
  ];

  if ($type['name']) {
    $t_name = $type['name'];
  } else {
    $t_name = c_detect_name($type['ofType']);
  }
  if (array_key_exists($t_name, $map)) {
    $out = $map[$t_name];
  } else {
    $out = $t_name;
  }
  if ($type['kind'] == 'LIST') {
    return "{$out}[]";
  } else {
    return $out;
  }
}

function c_comment($type, $description)
{
  $content = "  /**\n";
  if ($type) {
    $content .= "   * @var " . c_detect_name($type) . "\n";
  }
  if ($description) {
    $content .= "   * " . $description . "\n";
  }
  $content .= "  */\n";
  return $content;
}

$url = 'http://127.0.0.1:3000/graphql';
$client = new Graphql();

$schemas = [
  new SchemaPublic($client, $url),
  new SchemaInternal($client, $url),
  new SchemaService($client, $url)
];

foreach ($schemas as $schema) {
  $ns = $schema->schemaNamespace();
  $classes_dir = __DIR__ . "/../src/Serwisant/SerwisantApi/Types/{$ns}";

  if (!file_exists($classes_dir)) {
    mkdir($classes_dir);
  }

  foreach ($schema->introspection()['types'] as $typedef) {
    $filename = null;
    $content = null;

    if (substr($typedef['name'], 0, 2) == '__') {
      continue;
    }

    switch ($typedef['kind']) {
      case 'ENUM':
        $filename = $typedef['name'];
        $content = c_header($ns, $typedef['name'], 'Enum');
        foreach ($typedef['enumValues'] as $enum) {
          $content .= c_comment('', $enum['description']);
          $content .= "  const {$enum['name']} = '{$enum['name']}';\n\n";
        }
        break;

      case 'OBJECT':
        $filename = $typedef['name'];
        $content = c_header($ns, $typedef['name'], 'Obj');
        foreach ($typedef['fields'] as $field) {
          switch ($field['type']['kind']) {
            case 'LIST':
              $content .= c_comment($field['type'], $field['description']);
              $content .= "  public \${$field['name']} = [];\n";
              break;
            default:
              $content .= c_comment($field['type'], $field['description']);
              $content .= "  public \${$field['name']};\n\n";
              break;
          }
        }
        break;

      default:
        # nic
    }
    if ($filename && $content) {
      file_put_contents("{$classes_dir}/{$filename}.php", $content . "}");
    }
  }
}
