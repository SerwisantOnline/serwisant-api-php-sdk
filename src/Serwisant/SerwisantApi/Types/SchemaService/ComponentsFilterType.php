<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ComponentsFilterType extends Types\Enum
{
  /**
  */
  const ID = 'ID';

  /**
  */
  const ALL = 'ALL';

  /**
  */
  const SEARCH = 'SEARCH';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}