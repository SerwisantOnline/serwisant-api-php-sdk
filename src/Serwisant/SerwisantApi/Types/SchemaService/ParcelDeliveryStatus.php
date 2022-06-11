<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelDeliveryStatus extends Types\Enum
{
  /**
  */
  const NOT_ORDERED = 'NOT_ORDERED';

  /**
  */
  const ORDERED = 'ORDERED';

  /**
  */
  const COLLECTED = 'COLLECTED';

  /**
  */
  const NOT_COLLECTED = 'NOT_COLLECTED';

  /**
  */
  const TRANSIT = 'TRANSIT';

  /**
  */
  const DELIVERY = 'DELIVERY';

  /**
  */
  const DELIVERED = 'DELIVERED';

  /**
  */
  const NOT_DELIVERED = 'NOT_DELIVERED';

  /**
  */
  const CANCELED = 'CANCELED';

  /**
  */
  const RETURNED = 'RETURNED';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}