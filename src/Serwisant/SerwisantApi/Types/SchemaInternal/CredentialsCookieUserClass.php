<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CredentialsCookieUserClass extends Types\Enum
{
  /**
  */
  const EMPLOYEE = 'EMPLOYEE';

  /**
  */
  const DEMO = 'DEMO';

  /**
  */
  const UNAUTHORISED = 'UNAUTHORISED';

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}