<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ServiceSuppliersFilterType extends Types\Enum
{
  /**
  */
  const ID = 'ID';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}