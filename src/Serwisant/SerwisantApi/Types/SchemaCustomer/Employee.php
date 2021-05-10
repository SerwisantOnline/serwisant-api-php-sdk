<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Employee extends Types\Type
{
  /**
   * @var string
  */
  public $displayName;

  /**
   * @var ServiceSupplier
  */
  public $serviceSupplier;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}