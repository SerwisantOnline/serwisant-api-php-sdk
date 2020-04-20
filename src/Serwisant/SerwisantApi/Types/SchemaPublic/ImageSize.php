<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ImageSize extends Types\Enum
{
  /**
  */
  const ORIGINAL = 'ORIGINAL';

  /**
  */
  const THUMBNAIL = 'THUMBNAIL';

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}