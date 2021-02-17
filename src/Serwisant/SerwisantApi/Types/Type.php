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
    if (false === self::isAssocArray($object)) {
      $instances = [];
      foreach ($object as $value) {
        $instances[] = self::spawn($schema_namespace, $value);
      }
      return $instances;
    } else {
      if (!array_key_exists('__typename', $object)) {
        throw new Exception("object or query {$id} in schema {$schema_namespace} has no __typename field - You must add this field to each query object");
      }

      $class_name = $object['__typename'];
      $class_name = '\Serwisant\\SerwisantApi\\Types\\' . $schema_namespace . '\\' . $class_name;

      unset($object['__typename']);

      return new $class_name($object, true);
    }
  }

  public static function isAssocArray($arr)
  {
    return is_array($arr) && count($arr) > 0 && array_keys($arr) !== range(0, count($arr) - 1);
  }

  public function __construct(array $object = [], bool $typed_object = false)
  {
    if ($typed_object) {
      $this->fillUsingGraphqlResult($object);
    } else {
      $this->fillUsingArray($object);
    }
  }

  private function fillUsingGraphqlResult(array $object)
  {
    foreach ($object as $prop => $value) {
      if (is_array($value)) {
        $this->{$prop} = self::spawn($this->schemaNamespace(), $value, __CLASS__);
      } else {
        $this->{$prop} = $value;
      }
    }
    return $this;
  }

  private function fillUsingArray(array $object)
  {
    foreach ($object as $prop => $value) {
      $this->{$prop} = $value;
    }
    return $this;
  }

  abstract protected function schemaNamespace();
}