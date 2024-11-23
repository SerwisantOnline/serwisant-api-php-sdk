<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ServiceSupplierType extends Types\Enum
{
  /**
  */
  const MAIN = 'MAIN';

  /**
  */
  const BRANCH = 'BRANCH';

  /**
  */
  const SERVICE_SUPPLIER = 'SERVICE_SUPPLIER';

  /**
  */
  const EXCHANGE_TARGET = 'EXCHANGE_TARGET';

  /**
  */
  const EXCHANGE_SOURCE = 'EXCHANGE_SOURCE';

  protected function schemaNamespace()
  {
    return 'SchemaMobile';
  }
}