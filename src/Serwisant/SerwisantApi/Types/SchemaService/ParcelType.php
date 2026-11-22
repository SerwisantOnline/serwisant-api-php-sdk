<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelType extends Types\Enum
{
  /**
  */
  const ENVELOPE = 'ENVELOPE';

  /**
  */
  const BOX = 'BOX';

  /**
  */
  const PALETTE = 'PALETTE';

  /**
  */
  const BOX_OVERSIZED = 'BOX_OVERSIZED';

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}