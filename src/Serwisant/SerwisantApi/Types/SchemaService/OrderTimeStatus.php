<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OrderTimeStatus extends Types\Enum
{
  /**
   * Inside agreed timespan
  */
  const OK = 'OK';

  /**
   * Approaching to timespan border
  */
  const WARNING = 'WARNING';

  /**
   * Out of time
  */
  const DELAYED = 'DELAYED';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}