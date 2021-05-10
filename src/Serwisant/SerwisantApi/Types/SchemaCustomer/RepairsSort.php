<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairsSort extends Types\Enum
{
  /**
   * Creation date
  */
  const DATE_CREATED = 'DATE_CREATED';

  /**
  */
  const DATE_STARTED = 'DATE_STARTED';

  /**
  */
  const DATE_STARTED_REV = 'DATE_STARTED_REV';

  /**
  */
  const DATE_UPDATED = 'DATE_UPDATED';

  /**
  */
  const RMA = 'RMA';

  /**
  */
  const CUSTOMER = 'CUSTOMER';

  /**
  */
  const STATUS = 'STATUS';

  /**
  */
  const DAYS_REMAINING = 'DAYS_REMAINING';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}