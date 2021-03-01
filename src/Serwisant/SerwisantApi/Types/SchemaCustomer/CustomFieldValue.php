<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomFieldValue extends Types\Type
{
  /**
   * @var CustomField
  */
  public $field;

  /**
   * @var string
  */
  public $value;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}