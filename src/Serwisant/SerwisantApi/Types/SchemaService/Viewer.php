<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Viewer extends Types\Type
{
  /**
   * @var Employee
   * Current employee
  */
  public $employee;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}