<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelTrackingStatus extends Types\Enum
{
  /**
  */
  const OTHER = 'OTHER';

  /**
  */
  const INVALID_CONFIGURATION = 'INVALID_CONFIGURATION';

  /**
  */
  const SUBMISSION_ERROR = 'SUBMISSION_ERROR';

  /**
  */
  const CREATED = 'CREATED';

  /**
  */
  const UPDATED = 'UPDATED';

  /**
  */
  const SUBMISSION = 'SUBMISSION';

  /**
  */
  const CLOSED = 'CLOSED';

  /**
  */
  const ORDERED = 'ORDERED';

  /**
  */
  const COLLECTION = 'COLLECTION';

  /**
  */
  const COLLECTION_ISSUE = 'COLLECTION_ISSUE';

  /**
  */
  const TRANSIT = 'TRANSIT';

  /**
  */
  const DELIVERY = 'DELIVERY';

  /**
  */
  const DELIVERY_ISSUE = 'DELIVERY_ISSUE';

  /**
  */
  const DELIVERED = 'DELIVERED';

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