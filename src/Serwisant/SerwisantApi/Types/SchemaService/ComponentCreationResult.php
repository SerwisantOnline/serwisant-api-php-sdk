<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ComponentCreationResult extends Types\Type
{
  /**
   * @var Component
  */
  public $component;

  /**
   * @var Error[]
  */
  public $errors = [];
  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}