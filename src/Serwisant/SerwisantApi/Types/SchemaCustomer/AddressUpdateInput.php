<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class AddressUpdateInput extends Types\Type
{
  /**
   * @var string
  */
  public $PK;

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

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}