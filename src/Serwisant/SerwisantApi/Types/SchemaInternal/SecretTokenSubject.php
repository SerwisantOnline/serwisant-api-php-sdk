<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class SecretTokenSubject extends Types\Enum
{
  /**
  */
  const LICENCE = 'LICENCE';

  /**
  */
  const REPAIR = 'REPAIR';

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}