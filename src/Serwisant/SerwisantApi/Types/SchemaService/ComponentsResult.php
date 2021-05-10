<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ComponentsResult extends Types\Type
{
  /**
   * @var Component[]
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