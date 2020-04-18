<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi\Types;

class InternalMutation extends Types\Obj
{
  /**
   * @var SubscriberActivationResult
   * Activate new account
  */
  public $activateSubscriber;

  /**
   * @var ContactMessageResult
   * Submit a contact message
  */
  public $createContactMessage;

  /**
   * @var DemoAccessResult
   * Create access to demo version
  */
  public $createDemoAccess;

  /**
   * @var SubscriberCreationResult
   * Sign-up for a new account
  */
  public $createSubscriber;

}