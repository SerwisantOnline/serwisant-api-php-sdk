<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketsResult extends Types\Type
{
  /**
   * @var Ticket[]
  */
  public $items;

  /**
   * @var int
  */
  public $pages;

  protected function schemaNamespace()
  {
    return 'SchemaMobile';
  }
}