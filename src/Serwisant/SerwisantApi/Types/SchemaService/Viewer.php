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

  /**
   * @var Subscriber
   * Information from public registry
  */
  public $subscriber;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}