<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class NoteInput extends Types\Type
{
  /**
   * @var string
  */
  public $title;

  /**
   * @var string
  */
  public $content;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}