<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Viewer extends Types\Type
{
  /**
   * @var Customer
  */
  public $customer;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}