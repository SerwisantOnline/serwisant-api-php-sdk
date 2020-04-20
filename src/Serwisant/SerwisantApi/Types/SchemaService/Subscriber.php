<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Subscriber extends Types\Type
{
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
    return 'SchemaService';
  }
}