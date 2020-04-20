<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Dictionary extends Types\Type
{
  /**
   * @var string
  */
  public $name;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}