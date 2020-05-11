<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

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

  /**
  */
  const ONLINEPAYMENT = 'ONLINEPAYMENT';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}