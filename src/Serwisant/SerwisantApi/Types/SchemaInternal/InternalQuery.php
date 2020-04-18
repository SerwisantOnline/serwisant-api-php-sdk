<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi\Types;

class InternalQuery extends Types\Obj
{
  /**
   * @var CredentialsCookie
   * Return information related to user\'s credential cookie
  */
  public $credentialsCookie;

  /**
   * @var SecretToken
  */
  public $secretToken;

  /**
   * @var SubscriberAgreement[]
   * Agreements to accept when creating a new account
  */
  public $subscriberAgreements;

  /**
   * @var SubscriptionLevel[]
   * Subscription levels available for sale
  */
  public $subscriptionLevels;

}