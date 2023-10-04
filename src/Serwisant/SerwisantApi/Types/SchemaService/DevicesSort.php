<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class DevicesSort extends Types\Enum
{
  /**
  */
  const ID = 'ID';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}