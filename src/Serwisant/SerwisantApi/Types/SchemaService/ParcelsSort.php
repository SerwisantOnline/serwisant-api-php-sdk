<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelsSort extends Types\Enum
{
  /**
  */
  const DATE_CREATED = 'DATE_CREATED';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}