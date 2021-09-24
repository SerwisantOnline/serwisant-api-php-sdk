<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ComponentDeliveryInput extends Types\Type
{
  /**
   * @var string
  */
  public $supplierName;

  /**
   * @var string
  */
  public $serialNumber;

  /**
   * @var Money
  */
  public $priceNet;

  /**
   * @var float
   * VAT rate in percent points, eg. 23, 0
  */
  public $vat;

  /**
   * @var int
  */
  public $quantity;

  /**
   * @var string
  */
  public $purchaseDate;

  /**
   * @var string
  */
  public $invoiceSignature;

  /**
   * @var string
  */
  public $warehouse;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}