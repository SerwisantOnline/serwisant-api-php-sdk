<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

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

}