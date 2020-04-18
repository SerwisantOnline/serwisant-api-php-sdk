<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class RepairTransportType extends Types\Enum
{
  /**
   * Customer will deliver or pick-up repair by himself
  */
  const PERSONAL = 'PERSONAL';

  /**
   * Repair will be delivered or returned-back via parcel
  */
  const PARCEL = 'PARCEL';

  /**
   * Repair will be delivered or returned-back by service employee
  */
  const INTERNAL = 'INTERNAL';

}