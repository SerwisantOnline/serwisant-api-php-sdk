<?php

namespace Serwisant\SerwisantApi\Types;

abstract class Type
{
  /**
   * @param $schema_namespace
   * @param array $object
   * @param string $id
   * @return mixed
   * @throws Exception
   */
  public static function spawn($schema_namespace, array $object, $id = '')
  {
    if (!array_key_exists('__typename', $object)) {
      throw new Exception("object or query {$id} in schema {$schema_namespace} has no __typename field - You must add this field to each query object");
    }

    $class_name = $object['__typename'];
    $class_name = '\Serwisant\\SerwisantApi\\Types\\' . $schema_namespace . '\\' . $class_name;

    $instance = new $class_name();
    $instance->fillUsingGraphqlResult($object);
    return $instance;
  }

  /**
   * @param $object
   * @throws Exception
   */
  public function fillUsingGraphqlResult($object)
  {
    $typename = $object['__typename'];
    unset($object['__typename']);
    foreach ($object as $prop => $value) {
      if ($this->is_assoc_array($value)) {
        $this->{$prop} = self::spawn($this->schemaNamespace(), $value, $typename);
      } else {
        $this->{$prop} = $value;
      }
    }
  }

  abstract protected function schemaNamespace();

  private function is_assoc_array($arr)
  {
    return is_array($arr) && count($arr) > 0 && array_keys($arr) !== range(0, count($arr) - 1);
  }
}