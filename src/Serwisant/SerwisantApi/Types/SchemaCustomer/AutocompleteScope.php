<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class AutocompleteScope extends Types\Enum
{
  /**
  */
  const VENDOR = 'VENDOR';

  /**
  */
  const MODEL = 'MODEL';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}