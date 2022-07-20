<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairSummaryInput extends Types\Type
{
  /**
   * @var Decimal
  */
  public $priceNet;

  /**
   * @var Decimal
  */
  public $vat;

  /**
   * @var string
  */
  public $publicRemarks;

  /**
   * @var int
  */
  public $warrantyPeriod;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}