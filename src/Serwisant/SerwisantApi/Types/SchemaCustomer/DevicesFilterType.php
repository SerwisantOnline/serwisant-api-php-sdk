<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class DevicesFilterType extends Types\Enum
{
  /**
  */
  const ALL = 'ALL';

  /**
  */
  const ID = 'ID';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}