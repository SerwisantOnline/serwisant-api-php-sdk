<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairSummaryUpdateResult extends Types\Type
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
    return 'SchemaService';
  }
}