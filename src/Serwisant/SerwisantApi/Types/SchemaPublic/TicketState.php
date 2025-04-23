<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketState extends Types\Enum
{
  /**
  */
  const UNSAVED = 'UNSAVED';

  /**
  */
  const NEW = 'NEW';

  /**
  */
  const ASSIGNED = 'ASSIGNED';

  /**
  */
  const ON_THE_WAY = 'ON_THE_WAY';

  /**
  */
  const IN_PROGRESS = 'IN_PROGRESS';

  /**
  */
  const RESOLVED = 'RESOLVED';

  /**
  */
  const CANCELED = 'CANCELED';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}