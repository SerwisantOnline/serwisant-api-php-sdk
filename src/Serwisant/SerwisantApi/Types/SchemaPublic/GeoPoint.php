<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class GeoPoint extends Types\Type
{
  /**
   * @var string
  */
  public $lat;

  /**
   * @var string
  */
  public $lng;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}