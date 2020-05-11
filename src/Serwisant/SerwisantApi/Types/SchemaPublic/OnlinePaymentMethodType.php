<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlinePaymentMethodType extends Types\Enum
{
  /**
  */
  const TRANSFER = 'TRANSFER';

  /**
  */
  const BLIK = 'BLIK';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}