<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CountryCode extends Types\Enum
{
  /**
  */
  const PL = 'PL';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}