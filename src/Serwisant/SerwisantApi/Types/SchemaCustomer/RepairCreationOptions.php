<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairCreationOptions extends Types\Type
{
  /**
   * @var bool
  */
  public $skipFloodValidation;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}