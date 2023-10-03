<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairsFilterType extends Types\Enum
{
  /**
   * All repairs
  */
  const ALL = 'ALL';

  /**
   * Repair with particular ID, ID argument required
  */
  const ID = 'ID';

  /**
  */
  const DEVICE = 'DEVICE';

  /**
   * Only open repairs
  */
  const OPEN = 'OPEN';

  /**
   * Only expired repairs
  */
  const EXPIRED = 'EXPIRED';

  /**
   * Repairs in given status, status argument required
  */
  const STATUS = 'STATUS';

  /**
   * Search for repairs using keywords, argument q is required
  */
  const SEARCH = 'SEARCH';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}