<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class NoteSubjectType extends Types\Enum
{
  /**
  */
  const CUSTOMER = 'CUSTOMER';

  /**
  */
  const REPAIR = 'REPAIR';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}