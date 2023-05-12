<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Customer extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}