<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class DateRangeInput extends Types\Type
{
  /**
   * @var string
  */
  public $from;

  /**
   * @var string
  */
  public $to;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}