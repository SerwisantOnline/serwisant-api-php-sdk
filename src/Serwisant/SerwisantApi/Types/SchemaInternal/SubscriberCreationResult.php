<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi\Types;

class SubscriberCreationResult extends Types\Obj
{
  /**
   * @var Error[]
  */
  public $errors = [];
  /**
   * @var Subscriber
  */
  public $subscriber;

}