<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Address extends Types\Type
{
  /**
   * @var string
  */
  public $building;

  /**
   * @var string
  */
  public $city;

  /**
   * @var string
  */
  public $countryIso;

  /**
   * @var GeoPoint
  */
  public $geoPoint;

  /**
   * @var string
  */
  public $postalCode;

  /**
   * @var string
  */
  public $street;

  /**
   * @var string
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}