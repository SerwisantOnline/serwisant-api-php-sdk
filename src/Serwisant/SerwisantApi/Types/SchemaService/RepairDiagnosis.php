<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairDiagnosis extends Types\Type
{
  /**
   * @var string
  */
  public $internalRemarks;

  /**
   * @var string
  */
  public $publicRemarks;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}