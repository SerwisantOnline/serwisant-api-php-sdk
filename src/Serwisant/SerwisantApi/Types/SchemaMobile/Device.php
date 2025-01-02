<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Device extends Types\Type
{
  /**
   * @var string
  */
  public $displayName;

  /**
   * @var string
  */
  public $model;

  /**
   * @var Dictionary
  */
  public $type;

  /**
   * @var string
  */
  public $vendor;

  protected function schemaNamespace()
  {
    return 'SchemaMobile';
  }
}