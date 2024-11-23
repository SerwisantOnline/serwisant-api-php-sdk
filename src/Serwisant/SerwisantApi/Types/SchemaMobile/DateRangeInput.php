<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

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
    return 'SchemaMobile';
  }
}