<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairDelegationStatus extends Types\Enum
{
  /**
  */
  const UNSAVED = 'UNSAVED';

  /**
  */
  const DATA_EXCHANGE_REQUIRED = 'DATA_EXCHANGE_REQUIRED';

  /**
  */
  const READY_TO_SEND = 'READY_TO_SEND';

  /**
  */
  const SENT = 'SENT';

  /**
  */
  const DELIVERED = 'DELIVERED';

  /**
  */
  const SENT_BACK = 'SENT_BACK';

  /**
  */
  const RECEIVED = 'RECEIVED';

  /**
  */
  const CANCELED = 'CANCELED';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}