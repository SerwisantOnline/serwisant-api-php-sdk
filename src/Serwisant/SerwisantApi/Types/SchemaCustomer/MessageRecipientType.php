<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class MessageRecipientType extends Types\Enum
{
  /**
  */
  const CUSTOMER = 'CUSTOMER';

  /**
  */
  const EMPLOYEE = 'EMPLOYEE';

  /**
  */
  const SERVICE_SUPPLIER = 'SERVICE_SUPPLIER';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}