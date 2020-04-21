<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Employee extends Types\Type
{
  /**
   * @var string
  */
  public $displayName;

  /**
   * @var Subscriber
  */
  public $subscriber;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}