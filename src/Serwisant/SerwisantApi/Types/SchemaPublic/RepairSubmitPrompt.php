<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairSubmitPrompt extends Types\Enum
{
  /**
  */
  const NEVER = 'NEVER';

  /**
  */
  const ALWAYS = 'ALWAYS';

  /**
  */
  const FIRST = 'FIRST';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}