<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi\Types;

class Error extends Types\Obj
{
  /**
   * @var string
  */
  public $argument;

  /**
   * @var string
  */
  public $code;

  /**
   * @var string
  */
  public $message;

}