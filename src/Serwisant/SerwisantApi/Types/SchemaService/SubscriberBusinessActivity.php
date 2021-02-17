<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class SubscriberBusinessActivity extends Types\Enum
{
  /**
  */
  const OTHER = 'OTHER';

  /**
  */
  const PC = 'PC';

  /**
  */
  const CELL_PHONE = 'CELL_PHONE';

  /**
  */
  const ELECTRONIC = 'ELECTRONIC';

  /**
  */
  const HOUSEHOLD_EQUIPMENT = 'HOUSEHOLD_EQUIPMENT';

  /**
  */
  const BIKES = 'BIKES';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}