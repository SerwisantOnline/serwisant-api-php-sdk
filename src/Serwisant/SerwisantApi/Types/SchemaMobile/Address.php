<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

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
    return 'SchemaMobile';
  }
}