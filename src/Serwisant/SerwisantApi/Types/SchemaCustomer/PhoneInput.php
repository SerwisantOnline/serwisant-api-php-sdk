<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class PhoneInput extends Types\Type
{
  /**
   * @var string
  */
  public $number;

  /**
   * @var string
  */
  public $countryPrefix;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}