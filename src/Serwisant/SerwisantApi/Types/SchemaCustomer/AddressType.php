<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class AddressType extends Types\Enum
{
  /**
  */
  const HOME = 'HOME';

  /**
  */
  const BUSINESS = 'BUSINESS';

  /**
  */
  const OTHER = 'OTHER';

  /**
  */
  const BILLING = 'BILLING';

  /**
  */
  const GPS = 'GPS';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}