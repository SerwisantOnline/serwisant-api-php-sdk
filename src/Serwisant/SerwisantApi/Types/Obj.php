<?php

namespace Serwisant\SerwisantApi\Types;

class Obj
{
  public static function spawn($schema_namespace, array $object)
  {
    if (!array_key_exists('__typename', $object)) {
      throw new Exception("Given object definition has no __typename - You must add this field to each query object");
    }

    $class_name = $object['__typename'];
    $class_name = '\Serwisant\\SerwisantApi\\Types\\'. $schema_namespace. '\\' . $class_name;

    return new $class_name($schema_namespace, $object);
  }

  /**
   *
   * @param $schema_namespace
   * @param array $object
   * @throws Exception
   */
  public function __construct($schema_namespace, array $object)
  {
    unset($object['__typename']);

    foreach ($object as $prop => $value) {
      if ($this->is_assoc_array($value)) {
        $this->{$prop} = self::spawn($schema_namespace, $value);
      } else {
        $this->{$prop} = $value;
      }
    }
  }

  private function is_assoc_array($arr)
  {
    return is_array($arr) && count($arr) > 0 && array_keys($arr) !== range(0, count($arr) - 1);
  }
}