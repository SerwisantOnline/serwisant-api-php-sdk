<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class RepairState extends Types\Enum
{
  /**
  */
  const UNSAVED = 'UNSAVED';

  /**
  */
  const WAITING_FOR_DELIVERY = 'WAITING_FOR_DELIVERY';

  /**
  */
  const WAITING_FOR_DIAGNOSIS = 'WAITING_FOR_DIAGNOSIS';

  /**
  */
  const DIAGNOSIS = 'DIAGNOSIS';

  /**
  */
  const REQ_CUSTOMER_ACCEPT = 'REQ_CUSTOMER_ACCEPT';

  /**
  */
  const CONFIRMED = 'CONFIRMED';

  /**
  */
  const IN_PROGRESS = 'IN_PROGRESS';

  /**
  */
  const WAITING_FOR_PARTS = 'WAITING_FOR_PARTS';

  /**
  */
  const UNDER_TESTING = 'UNDER_TESTING';

  /**
  */
  const REQ_SUMMARY = 'REQ_SUMMARY';

  /**
  */
  const NOT_ACCEPTED = 'NOT_ACCEPTED';

  /**
  */
  const CANCELED = 'CANCELED';

  /**
  */
  const NOT_PROCESSABLE = 'NOT_PROCESSABLE';

  /**
  */
  const WAITING_FOR_COLLECTION = 'WAITING_FOR_COLLECTION';

  /**
  */
  const PASSED_FOR_RETURN = 'PASSED_FOR_RETURN';

  /**
  */
  const CLOSED = 'CLOSED';

  /**
  */
  const SCRAPPED = 'SCRAPPED';

}