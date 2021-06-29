<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketPaymentType extends Types\Enum
{
  /**
  */
  const INSTANT_FIXED = 'INSTANT_FIXED';

  /**
  */
  const INSTANT_TIME = 'INSTANT_TIME';

  /**
  */
  const SUBSCRIPTION_FIXED = 'SUBSCRIPTION_FIXED';

  /**
  */
  const SUBSCRIPTION_TIME = 'SUBSCRIPTION_TIME';

  /**
  */
  const CONTRACT = 'CONTRACT';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}