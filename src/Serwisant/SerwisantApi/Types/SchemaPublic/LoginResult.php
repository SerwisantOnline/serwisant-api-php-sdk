<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class LoginResult extends Types\Type
{
  /**
   * @var string
   * Valid username
  */
  public $login;

  /**
   * @var string[]
   * Empty if credential can log in, otherwise list reasons prevent from log in
  */
  public $unavailabilityReasons;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}