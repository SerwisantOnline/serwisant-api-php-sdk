<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Currency extends Types\Enum
{
  /**
  */
  const PLN = 'PLN';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}