<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlinePaymentStatus extends Types\Enum
{
  /**
  */
  const WAITING_FOR_PAYMENT = 'WAITING_FOR_PAYMENT';

  /**
  */
  const PAID = 'PAID';

  /**
  */
  const UNPAID = 'UNPAID';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}