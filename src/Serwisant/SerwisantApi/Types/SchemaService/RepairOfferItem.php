<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairOfferItem extends Types\Type
{
  /**
   * @var string
  */
  public $description;

  /**
   * @var Decimal
  */
  public $priceGross;

  /**
   * @var Decimal
  */
  public $priceNet;

  /**
   * @var string
  */
  public $type;

  /**
   * @var Decimal
  */
  public $vat;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}