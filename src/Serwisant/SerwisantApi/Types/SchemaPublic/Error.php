<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Error extends Types\Type
{
  /**
   * @var string
  */
  public $argument;

  /**
   * @var string
  */
  public $code;

  /**
   * @var string
  */
  public $message;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}