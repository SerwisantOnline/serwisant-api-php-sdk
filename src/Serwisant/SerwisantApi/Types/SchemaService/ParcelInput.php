<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelInput extends Types\Type
{
  /**
   * @var Decimal
   * unit: kg. Please note: weight, and other physicals must be exact. Underrated physicals can cause penalty fee from courier. Couriers have own weight and other limits. If given weight will exceed courier limit, there will be no pricing from that courier.
  */
  public $weight;

  /**
   * @var int
   * Unit: cm.
  */
  public $width;

  /**
   * @var int
   * Unit: cm.
  */
  public $height;

  /**
   * @var int
   * Unit: cm.
  */
  public $depth;

  /**
   * @var Decimal
   * Unit: application's currency, eg.: zł. Value of parcel contents, it will be used to create parcel insurance and will affect a cost.
  */
  public $declaredValue;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}