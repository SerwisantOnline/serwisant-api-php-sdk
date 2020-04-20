<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairDelegation extends Types\Type
{
  /**
   * @var ServiceSupplier
  */
  public $serviceSupplier;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}