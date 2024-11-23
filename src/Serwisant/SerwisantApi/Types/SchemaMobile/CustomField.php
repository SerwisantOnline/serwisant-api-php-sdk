<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomField extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $description;

  /**
   * @var string
  */
  public $name;

  /**
   * @var bool
  */
  public $required;

  /**
   * @var string[]
  */
  public $selectOptions = [];
  /**
   * @var string
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaMobile';
  }
}