<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlinePaymentSubjectType extends Types\Enum
{
  /**
  */
  const REPAIR = 'REPAIR';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}