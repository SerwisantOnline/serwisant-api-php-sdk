<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomFieldValueInput extends Types\Type
{
  /**
   * @var string
   * Field's primary key taken from customFields query
  */
  public $customField;

  /**
   * @var string
   * Field's value relevant to definition - string, `1`/`0` for boolean or one of value from set (select)
  */
  public $value;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}