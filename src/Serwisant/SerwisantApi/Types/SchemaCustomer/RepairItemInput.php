<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairItemInput extends Types\Type
{
  /**
   * @var string
  */
  public $type;

  /**
   * @var string
  */
  public $serial;

  /**
   * @var string
  */
  public $description;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}