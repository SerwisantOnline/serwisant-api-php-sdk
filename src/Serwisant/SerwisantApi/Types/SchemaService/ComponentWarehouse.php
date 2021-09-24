<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ComponentWarehouse extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $name;

  /**
   * @var string
  */
  public $remarks;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}