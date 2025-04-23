<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class PriorityType extends Types\Enum
{
  /**
  */
  const TICKET = 'TICKET';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}