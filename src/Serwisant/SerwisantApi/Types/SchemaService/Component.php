<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Component extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var ComponentDelivery[]
   * Deliveries of comppnent. Use `createComponentDelivery` mutation to create a new delivery.
  */
  public $deliveries;

  /**
   * @var string
  */
  public $description;

  /**
   * @var int
   * If available quantity will be below this value warning will be displayed
  */
  public $minQuantity;

  /**
   * @var string
  */
  public $name;

  /**
   * @var string
  */
  public $partNumber;

  /**
   * @var int
   * This is in-warehouse quantity calculated from all deliveries without quantities already sold.
Some of this quantity can be already reserved, so it's not an available quantity - to get available reduce this number by `reserved_quantity`

  */
  public $quantity;

  /**
   * @var string
  */
  public $remarks;

  /**
   * @var int
   * Not yet sold, but reserved for current repairs
  */
  public $reservedQuantity;

  /**
   * @var Money
   * Suggested retail price
  */
  public $srp;

  /**
   * @var Dictionary
   * This is a generic type of component
  */
  public $type;

  /**
   * @var string
  */
  public $url;

  /**
   * @var int
  */
  public $warrantyPeriod;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}