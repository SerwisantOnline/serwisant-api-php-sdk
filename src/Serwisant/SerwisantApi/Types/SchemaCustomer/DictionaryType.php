<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class DictionaryType extends Types\Enum
{
  /**
   * Repaired equipment types
  */
  const REPAIR_SUBJECT_TYPE = 'REPAIR_SUBJECT_TYPE';

  /**
   * Type of component from inventory
  */
  const COMPONENT_TYPE = 'COMPONENT_TYPE';

  /**
   * Category of ticket
  */
  const TICKET_CATEGORY = 'TICKET_CATEGORY';

  /**
   * Group od customers
  */
  const CUSTOMER_GROUP = 'CUSTOMER_GROUP';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}