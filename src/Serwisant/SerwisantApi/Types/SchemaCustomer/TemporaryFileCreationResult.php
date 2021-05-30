<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TemporaryFileCreationResult extends Types\Type
{
  /**
   * @var Error[]
  */
  public $errors = [];
  /**
   * @var TemporaryFile
  */
  public $temporaryFile;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}