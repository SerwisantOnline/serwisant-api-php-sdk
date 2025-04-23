<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelEdgeOwnerType extends Types\Enum
{
  /**
  */
  const SERVICE_SUPPLIER = 'SERVICE_SUPPLIER';

  /**
  */
  const CUSTOMER = 'CUSTOMER';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}