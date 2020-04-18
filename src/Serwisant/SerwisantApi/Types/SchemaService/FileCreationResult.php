<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class FileCreationResult extends Types\Obj
{
  /**
   * @var Error[]
  */
  public $errors = [];
  /**
   * @var File
  */
  public $file;

}