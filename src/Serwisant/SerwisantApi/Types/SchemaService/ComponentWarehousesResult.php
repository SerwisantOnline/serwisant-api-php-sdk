<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ComponentWarehousesResult extends Types\Type
{
  /**
   * @var ComponentWarehouse[]
  */
  public $items;

  /**
   * @var int
  */
  public $pages;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}