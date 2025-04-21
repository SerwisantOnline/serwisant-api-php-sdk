<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class DictionaryEntriesFilter extends Types\Type
{
  /**
   * @var string
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}