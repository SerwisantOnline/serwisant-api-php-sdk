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

  /**
  */
  const INTERNET_ACCESS_NOT_ENABLED = 'INTERNET_ACCESS_NOT_ENABLED';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}