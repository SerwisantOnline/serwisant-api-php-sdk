<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class CustomersFilterType extends Types\Enum
{
  /**
   * Customer with particular ID, ID argument required
  */
  const ID = 'ID';

  /**
   * All customers
  */
  const ALL = 'ALL';

  /**
   * Search for customers using keywords like email, phone, argument q is required
  */
  const SEARCH = 'SEARCH';

}