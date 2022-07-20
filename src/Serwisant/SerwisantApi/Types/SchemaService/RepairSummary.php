<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairSummary extends Types\Type
{
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
  public $publicRemarks;

  /**
   * @var Decimal
  */
  public $vat;

  /**
   * @var int
  */
  public $warrantyPeriod;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}