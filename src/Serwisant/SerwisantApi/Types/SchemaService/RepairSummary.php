<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairSummary extends Types\Type
{
  /**
   * @var string
  */
  public $publicRemarks;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}