<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class LoginUnavailabilityReason extends Types\Enum
{
  /**
  */
  const DELETED = 'DELETED';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}