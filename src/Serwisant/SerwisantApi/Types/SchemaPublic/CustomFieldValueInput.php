<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomFieldValueInput extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $value;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}