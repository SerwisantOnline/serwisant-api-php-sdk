<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelStatus extends Types\Enum
{
  /**
  */
  const NEW = 'NEW';

  /**
  */
  const READY_FOR_SUBMISSION = 'READY_FOR_SUBMISSION';

  /**
  */
  const SUBMITTED = 'SUBMITTED';

  /**
  */
  const CLOSED = 'CLOSED';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}