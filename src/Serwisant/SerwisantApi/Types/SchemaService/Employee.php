<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Employee extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $displayName;

  /**
   * @var ServiceSupplier
  */
  public $serviceSupplier;

  /**
   * @var Subscriber
  */
  public $subscriber;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}