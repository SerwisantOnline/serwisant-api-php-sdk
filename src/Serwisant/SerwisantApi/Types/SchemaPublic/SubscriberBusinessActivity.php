<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

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

  /**
  */
  const PHOTO = 'PHOTO';

  /**
  */
  const GARDEN = 'GARDEN';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}