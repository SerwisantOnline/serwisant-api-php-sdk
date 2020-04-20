<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TaxPrefix extends Types\Enum
{
  /**
  */
  const PL = 'PL';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}