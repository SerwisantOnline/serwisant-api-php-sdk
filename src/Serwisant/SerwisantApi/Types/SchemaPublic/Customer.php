<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Customer extends Types\Type
{
  /**
   * @var string
   * Time zone of customer, all times wisible for customer should be represented in this time zone
  */
  public $timeZone;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}