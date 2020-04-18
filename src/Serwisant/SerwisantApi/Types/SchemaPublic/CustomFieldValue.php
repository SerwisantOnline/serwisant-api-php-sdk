<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

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