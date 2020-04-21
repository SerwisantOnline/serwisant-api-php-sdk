<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Address extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

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
   * @var AddressType
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}