<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class SecretToken extends Types\Type
{
  /**
   * @var string
  */
  public $subjectType;

  /**
   * @var string
  */
  public $token;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}