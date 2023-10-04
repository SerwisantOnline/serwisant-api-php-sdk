<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class DeviceItem extends Types\Type
{
  /**
   * @var string
  */
  public $description;

  /**
   * @var string
  */
  public $serial;

  /**
   * @var Dictionary
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}