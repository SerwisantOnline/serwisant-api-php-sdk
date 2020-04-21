<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomField extends Types\Type
{
  /**
   * @var string
  */
  public $description;

  /**
   * @var string
  */
  public $name;

  /**
   * @var CustomFieldType
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}