<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class RepairsFilterType extends Types\Enum
{
  /**
   * Repair with particular ID, ID argument required
  */
  const ID = 'ID';

  /**
   * All repairs
  */
  const ALL = 'ALL';

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

}