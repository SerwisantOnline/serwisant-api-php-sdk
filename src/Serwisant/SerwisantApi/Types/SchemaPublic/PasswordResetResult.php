<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class PasswordResetResult extends Types\Type
{
  /**
   * @var Error[]
  */
  public $errors = [];
  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}