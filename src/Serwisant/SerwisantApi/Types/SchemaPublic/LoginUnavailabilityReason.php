<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class LoginUnavailabilityReason extends Types\Enum
{
  /**
  */
  const DELETED = 'DELETED';

  /**
  */
  const NOT_ACTIVATED = 'NOT_ACTIVATED';

  /**
  */
  const DISABLED = 'DISABLED';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}