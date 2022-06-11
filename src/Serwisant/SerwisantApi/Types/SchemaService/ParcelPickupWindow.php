<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelPickupWindow extends Types\Type
{
  /**
   * @var DateTime
  */
  public $from;

  /**
   * @var DateTime
  */
  public $to;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}