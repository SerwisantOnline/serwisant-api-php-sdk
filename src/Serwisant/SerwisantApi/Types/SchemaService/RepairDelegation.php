<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairDelegation extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var Decimal
  */
  public $costNet;

  /**
   * @var Decimal
  */
  public $priceNet;

  /**
   * @var string
  */
  public $remarks;

  /**
   * @var string
  */
  public $rma;

  /**
   * @var ServiceSupplier
  */
  public $serviceSupplier;

  /**
   * @var string
  */
  public $status;

  /**
   * @var Decimal
  */
  public $vat;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}