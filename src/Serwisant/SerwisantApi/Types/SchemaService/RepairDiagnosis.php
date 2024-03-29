<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairDiagnosis extends Types\Type
{
  /**
   * @var string
  */
  public $internalRemarks;

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

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}