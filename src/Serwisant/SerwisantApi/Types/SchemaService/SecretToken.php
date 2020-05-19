<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class SecretToken extends Types\Type
{
  /**
   * @var SecretTokenSubject
  */
  public $subjectType;

  /**
   * @var string
  */
  public $token;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}