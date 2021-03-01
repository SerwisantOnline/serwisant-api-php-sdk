<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Dictionary extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $name;

  /**
   * @var DictionaryType
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}