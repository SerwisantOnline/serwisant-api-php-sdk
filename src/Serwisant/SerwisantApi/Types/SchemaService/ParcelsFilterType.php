<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelsFilterType extends Types\Enum
{
  /**
  */
  const ALL = 'ALL';

  /**
  */
  const ID = 'ID';

  /**
  */
  const STATUS = 'STATUS';

  /**
  */
  const TRACKING_NUMBER = 'TRACKING_NUMBER';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}