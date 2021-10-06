<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class AcceptOrRejectRepairDecision extends Types\Enum
{
  /**
  */
  const ACCEPT = 'ACCEPT';

  /**
  */
  const REJECT = 'REJECT';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}