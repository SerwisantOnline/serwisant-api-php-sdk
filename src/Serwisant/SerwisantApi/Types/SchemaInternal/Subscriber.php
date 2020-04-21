<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Subscriber extends Types\Type
{
  /**
   * @var int
  */
  public $ID;

  /**
   * @var string
  */
  public $activationToken;

  /**
   * @var string
  */
  public $companyName;

  /**
   * @var string
  */
  public $displayName;

  /**
   * @var string
  */
  public $email;

  /**
   * @var string
  */
  public $number;

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}