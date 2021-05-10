<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketsFilterType extends Types\Enum
{
  /**
  */
  const ID = 'ID';

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

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}