<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class Employee extends Types\Obj
{
  /**
   * @var string
  */
  public $displayName;

  /**
   * @var Subscriber
  */
  public $subscriber;

}