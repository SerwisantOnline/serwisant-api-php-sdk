<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class MessagesFilterType extends Types\Enum
{
  /**
  */
  const ID = 'ID';

  /**
  */
  const ALL = 'ALL';

  /**
  */
  const ARCHIVED = 'ARCHIVED';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}