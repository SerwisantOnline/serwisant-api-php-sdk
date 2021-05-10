<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ComponentDelivery extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $invoiceSignature;

  /**
   * @var Money
  */
  public $priceNet;

  /**
   * @var string
  */
  public $purchasedAt;

  /**
   * @var int
  */
  public $quantity;

  /**
   * @var int
  */
  public $reservedQuantity;

  /**
   * @var string
  */
  public $serial;

  /**
   * @var string
  */
  public $supplier;

  /**
   * @var float
  */
  public $vat;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}