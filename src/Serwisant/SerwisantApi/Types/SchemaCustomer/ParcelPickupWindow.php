<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

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
    return 'SchemaCustomer';
  }
}