<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelPricing extends Types\Type
{
  /**
   * @var string
   * This identifier should be passed to `submitParcel` mutation, to define a courier for parcel shipping.
  */
  public $ID;

  /**
   * @var string
  */
  public $courierName;

  /**
   * @var Decimal
  */
  public $priceGross;

  /**
   * @var Decimal
   * Price, depends on many factors: physicals, distance, value.
  */
  public $priceNet;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}