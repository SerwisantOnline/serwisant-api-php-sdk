<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

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

  /**
  */
  const FAILED = 'FAILED';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}