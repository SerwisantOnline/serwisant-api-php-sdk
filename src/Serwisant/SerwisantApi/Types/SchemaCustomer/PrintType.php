<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class PrintType extends Types\Enum
{
  /**
  */
  const REPAIR_INTRO = 'REPAIR_INTRO';

  /**
  */
  const REPAIR_SUMMARY = 'REPAIR_SUMMARY';

  /**
  */
  const TICKET = 'TICKET';

  /**
  */
  const PARCEL = 'PARCEL';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}