<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

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

  /**
  */
  const DEVICE = 'DEVICE';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}