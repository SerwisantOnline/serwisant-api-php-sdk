<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ScheduleConcern extends Types\Enum
{
  /**
  */
  const CUSTOMER = 'CUSTOMER';

  /**
  */
  const DEVICE = 'DEVICE';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}