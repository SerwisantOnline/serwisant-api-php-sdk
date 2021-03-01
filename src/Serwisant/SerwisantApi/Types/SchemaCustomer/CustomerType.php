<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerType extends Types\Enum
{
  /**
   * Person
  */
  const PERSONAL = 'PERSONAL';

  /**
   * Company
  */
  const BUSINESS = 'BUSINESS';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}