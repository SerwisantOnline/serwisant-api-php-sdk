<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomFieldForm extends Types\Enum
{
  /**
  */
  const REPAIR = 'REPAIR';

  /**
  */
  const TICKET = 'TICKET';

  /**
  */
  const CUSTOMER = 'CUSTOMER';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}