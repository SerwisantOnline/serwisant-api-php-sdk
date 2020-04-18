<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class RepairOfferItemType extends Types\Enum
{
  /**
   * This is a part od offer
  */
  const OFFER = 'OFFER';

  /**
   * Diagnosis part, inserted in automated way if present
  */
  const DIAGNOSIS = 'DIAGNOSIS';

}