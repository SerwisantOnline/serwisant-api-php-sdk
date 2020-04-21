<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CredentialsCookie extends Types\Type
{
  /**
   * @var CredentialsCookieUserClass
  */
  public $userClass;

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}