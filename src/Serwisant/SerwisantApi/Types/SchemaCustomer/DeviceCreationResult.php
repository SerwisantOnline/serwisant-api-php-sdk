<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class DeviceCreationResult extends Types\Type
{
  /**
   * @var Device
  */
  public $device;

  /**
   * @var Error[]
  */
  public $errors = [];
  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}