<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi\Types;

class CustomField extends Types\Obj
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

}