<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairDiagnosisInput extends Types\Type
{
  /**
   * @var string
  */
  public $internalRemarks;

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

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}