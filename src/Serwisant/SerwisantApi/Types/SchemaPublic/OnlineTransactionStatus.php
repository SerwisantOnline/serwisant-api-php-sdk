<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlineTransactionStatus extends Types\Enum
{
  /**
   * Brand new transaction, not submitted to payment processor yet, pool for result using query `paymentTransaction`
  */
  const CREATED = 'CREATED';

  /**
   * Transaction was submitted and will be processed asynchronously, pool for result using query `paymentTransaction`
  */
  const POOL = 'POOL';

  /**
   * Transaction was submitted but require redirection first, eg. for bank login, or 3DS authorisation, next must
be pooled. Please note, when customer come back from redirect, transaction status probably won't change - it's
processed asynchronously - it's on your side to care about to pool not to redirect again. Hint: use `successUrl`
and `errorUrl` at `pay` mutation to pass data.
  */
  const REDIRECT_POOL = 'REDIRECT_POOL';

  /**
  */
  const SUCCESSFUL = 'SUCCESSFUL';

  /**
  */
  const FAILED = 'FAILED';

  /**
  */
  const REFUNDED = 'REFUNDED';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}