<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class AddressInput extends Types\Type
{
  /**
   * @var string
  */
  public $type;

  /**
   * @var string
  */
  public $street;

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
  public $postalCode;

  /**
   * @var string
  */
  public $countryIso;

  /**
   * @var GeoPointInput
  */
  public $geoPoint;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}