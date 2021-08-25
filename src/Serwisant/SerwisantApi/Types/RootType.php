<?php

namespace Serwisant\SerwisantApi\Types;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\GraphqlClient;

abstract class RootType
{
  const SCHEMA_PUBLIC = 'SchemaPublic';
  const SCHEMA_INTERNAL = 'SchemaInternal';
  const SCHEMA_SERVICE = 'SchemaService';
  const SCHEMA_CUSTOMER = 'SchemaCustomer';

  private $client;
  private $load_paths;

  public function __construct(GraphqlClient $client, $load_paths = [])
  {
    $this->client = $client;
    $this->load_paths = $load_paths;
  }

  abstract protected function schemaNamespace();

  /**
   * @param $mutation
   * @param $args
   * @return mixed
   * @throws Exception
   * @throws SerwisantApi\Exception
   * @throws SerwisantApi\ExceptionAccessDenied
   * @throws SerwisantApi\ExceptionNotFound
   */
  protected function inputArgs($mutation, $args)
  {
    return $this->newRequest()->setFile("{$mutation}.graphql", $this->typesToArray($args))->execute()->fetch();
  }

  /**
   * @return SerwisantApi\GraphqlRequest
   * @throws SerwisantApi\Exception
   */
  public function newRequest()
  {
    switch ($this->schemaNamespace()) {
      case self::SCHEMA_PUBLIC:
        return new SerwisantApi\GraphqlRequest($this->client, 'public', $this->schemaNamespace(), $this->load_paths);
      case self::SCHEMA_SERVICE:
        return new SerwisantApi\GraphqlRequest($this->client, 'service', $this->schemaNamespace(), $this->load_paths);
      case self::SCHEMA_INTERNAL:
        return new SerwisantApi\GraphqlRequest($this->client, 'internal', $this->schemaNamespace(), $this->load_paths);
      case self::SCHEMA_CUSTOMER:
        return new SerwisantApi\GraphqlRequest($this->client, 'customer', $this->schemaNamespace(), $this->load_paths);
      default:
        throw new SerwisantApi\Exception("Unsupported schema namespace {$this->schemaNamespace()}");
    }
  }

  /**
   * @param $args
   * @return array
   */
  private function typesToArray($args)
  {
    if (!is_array($args) || count($args) == 0) {
      return $args;
    }

    $mapper = function ($item) use (&$mapper) {
      if (is_array($item)) {
        return array_map($mapper, $item);
      } else {
        if ($item instanceof Enum) {
          return (string)$item;
        } elseif ($item instanceof Type) {
          return array_map($mapper, get_object_vars($item));
        } else {
          return $item;
        }
      }
    };
    return array_map($mapper, $args);
  }
}