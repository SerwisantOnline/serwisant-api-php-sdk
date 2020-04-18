<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class CustomFieldValue extends Types\Obj
{
  /**
   * @var CustomField
  */
  public $field;

  /**
   * @var string
  */
  public $value;

}