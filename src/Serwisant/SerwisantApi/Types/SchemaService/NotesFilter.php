<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class NotesFilter extends Types\Type
{
  /**
   * @var bool
  */
  public $withResolved;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}