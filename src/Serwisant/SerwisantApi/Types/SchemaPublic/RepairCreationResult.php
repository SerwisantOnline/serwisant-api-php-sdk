<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairCreationResult extends Types\Type
{
  /**
   * @var Error[]
  */
  public $errors = [];
  /**
   * @var Repair
  */
  public $repair;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}