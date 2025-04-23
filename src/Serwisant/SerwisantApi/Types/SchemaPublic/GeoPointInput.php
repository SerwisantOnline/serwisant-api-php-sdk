<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class GeoPointInput extends Types\Type
{
  /**
   * @var string
  */
  public $lng;

  /**
   * @var string
  */
  public $lat;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}