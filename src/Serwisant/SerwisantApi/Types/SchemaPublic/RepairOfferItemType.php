<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
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

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}