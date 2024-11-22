<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RatingSubjectType extends Types\Enum
{
  /**
  */
  const REPAIR = 'REPAIR';

  /**
  */
  const TICKET = 'TICKET';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}