<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketsSort extends Types\Enum
{
  /**
  */
  const ID = 'ID';

  /**
  */
  const CREATED_AT = 'CREATED_AT';

  /**
  */
  const STATUS = 'STATUS';

  protected function schemaNamespace()
  {
    return 'SchemaMobile';
  }
}