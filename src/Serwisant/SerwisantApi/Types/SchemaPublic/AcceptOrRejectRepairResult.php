<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class AcceptOrRejectRepairResult extends Types\Type
{
  /**
   * @var Error[]
  */
  public $errors = [];
  /**
   * @var bool
  */
  public $success;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}