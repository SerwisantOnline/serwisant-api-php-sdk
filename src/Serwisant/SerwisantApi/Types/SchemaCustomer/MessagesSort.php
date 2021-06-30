<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class MessagesSort extends Types\Enum
{
  /**
  */
  const DATE_UPDATED = 'DATE_UPDATED';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}