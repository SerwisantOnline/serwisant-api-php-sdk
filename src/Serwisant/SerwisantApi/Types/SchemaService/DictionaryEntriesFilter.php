<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class DictionaryEntriesFilter extends Types\Type
{
  /**
   * @var DictionaryType
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}