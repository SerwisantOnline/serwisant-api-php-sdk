<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairItem extends Types\Type
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
    return 'SchemaCustomer';
  }
}