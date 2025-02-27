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
  public static function spawn($schema_namespace, $object, $id = '')
  {
    if (is_array($object) && false === self::isAssocArray($object)) {
      $instances = [];
      foreach ($object as $value) {
        if (is_array($value)) {
          $instances[] = self::spawn($schema_namespace, $value, $id);
        } else {
          $instances[] = $value;
        }
      }
      return $instances;
    } elseif (is_array($object)) {
      if (!array_key_exists('__typename', $object)) {
        throw new Exception("object or query '{$id}' in schema {$schema_namespace} has no __typename field - You must add this field to each query object");
      }

      $class_name = $object['__typename'];
      $class_name = '\Serwisant\\SerwisantApi\\Types\\' . $schema_namespace . '\\' . $class_name;

      unset($object['__typename']);

      return new $class_name($object, true);
    } else {
      return $object;
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

  /**
   * @return array
   */
  public function toArray($except = [])
  {
    $result = [];
    $reflect = new \ReflectionClass($this);
    foreach ($reflect->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
      if (!in_array($property->getName(), $except)) {
        $result[$property->getName()] = $property->getValue($this);
      }
    }
    return $result;
  }

  public function __toString()
  {
    return print_r($this, 1);
  }

  private function fillUsingGraphqlResult(array $object)
  {
    foreach ($object as $prop => $value) {
      if (is_array($value)) {
        $this->{$prop} = self::spawn($this->schemaNamespace(), $value, (get_class($this) . '->' . $prop ));
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