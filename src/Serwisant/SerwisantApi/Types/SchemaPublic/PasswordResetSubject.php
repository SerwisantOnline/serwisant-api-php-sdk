<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class PasswordResetSubject extends Types\Enum
{
  /**
  */
  const CUSTOMER = 'CUSTOMER';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}