<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ComponentInput extends Types\Type
{
  /**
   * @var string
   * ID of generic component type. Use `dictionaryEntries` query with `COMPONENT_TYPE` type filter, to get an ID and pass it here.
  */
  public $type;

  /**
   * @var int
  */
  public $minQuantity;

  /**
   * @var string
  */
  public $name;

  /**
   * @var string
  */
  public $description;

  /**
   * @var string
  */
  public $remarks;

  /**
   * @var string
  */
  public $partNumber;

  /**
   * @var string
  */
  public $url;

  /**
   * @var int
  */
  public $warrantyPeriod;

  /**
   * @var Decimal
  */
  public $srp;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}