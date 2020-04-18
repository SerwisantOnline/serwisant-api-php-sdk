<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi\Types;

class Subscriber extends Types\Obj
{
  /**
   * @var Int
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

}