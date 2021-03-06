<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

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
    return 'SchemaService';
  }
}