<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketsFilterType extends Types\Enum
{
  /**
  */
  const ID = 'ID';

  /**
  */
  const DEVICE = 'DEVICE';

  /**
  */
  const ALL = 'ALL';

  /**
  */
  const OPEN = 'OPEN';

  /**
  */
  const STATUS = 'STATUS';

  /**
  */
  const SEARCH = 'SEARCH';

  /**
  */
  const SCHEDULED_ON = 'SCHEDULED_ON';

  protected function schemaNamespace()
  {
    return 'SchemaMobile';
  }
}