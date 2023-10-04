<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ServiceSuppliersFilterType extends Types\Enum
{
  /**
  */
  const ALL = 'ALL';

  /**
  */
  const INTERNAL = 'INTERNAL';

  /**
  */
  const EXTERNAL = 'EXTERNAL';

  /**
  */
  const ID = 'ID';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}