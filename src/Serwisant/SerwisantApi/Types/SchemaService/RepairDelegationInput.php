<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairDelegationInput extends Types\Type
{
  /**
   * @var string
  */
  public $remarks;

  /**
   * @var string
  */
  public $rma;

  /**
   * @var Decimal
  */
  public $costNet;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}