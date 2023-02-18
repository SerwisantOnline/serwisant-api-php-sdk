<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ScheduleDatesFilter extends Types\Type
{
  /**
   * @var DateRangeInput
  */
  public $dateRange;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}