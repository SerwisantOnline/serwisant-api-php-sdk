<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

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
  const TICKET = 'TICKET';

  /**
  */
  const ONLINEPAYMENT = 'ONLINEPAYMENT';

  /**
  */
  const PARCEL = 'PARCEL';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}