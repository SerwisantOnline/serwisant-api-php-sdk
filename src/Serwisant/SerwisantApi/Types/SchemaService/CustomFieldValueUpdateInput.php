<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomFieldValueUpdateInput extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $customField;

  /**
   * @var string
  */
  public $value;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}