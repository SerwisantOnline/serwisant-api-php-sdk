<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomField extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var Dictionary
  */
  public $concern;

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
   * @var CustomFieldType
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}