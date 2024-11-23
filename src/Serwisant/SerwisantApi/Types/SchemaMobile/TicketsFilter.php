<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketsFilter extends Types\Type
{
  /**
   * @var string
  */
  public $type;

  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $status;

  /**
   * @var string
  */
  public $q;

  /**
   * @var DateRangeInput
  */
  public $dateRange;

  protected function schemaNamespace()
  {
    return 'SchemaMobile';
  }
}