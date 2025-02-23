<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class InternalQuery extends Types\RootType
{
  /**
   * Return information related to user\'s credential cookie
   * @param string $cookie
   * @return CredentialsCookie
   */
  public function credentialsCookie(string $cookie = null, $vars = array())
  {
     return $this->inputArgs('credentialsCookie', array_merge($vars, ['cookie' => $cookie]));
  }

  /**
   * Agreements to accept when creating a new account
   * @param SubscriberAgreementsFilter $filter
   * @return SubscriberAgreement[]
   */
  public function subscriberAgreements(SubscriberAgreementsFilter $filter = null, $vars = array())
  {
     return $this->inputArgs('subscriberAgreements', array_merge($vars, ['filter' => $filter]));
  }

  /**
   * Subscription levels available for sale
   * @return SubscriptionLevel[]
   */
  public function subscriptionLevels($vars = array())
  {
     return $this->inputArgs('subscriptionLevels', array_merge($vars, []));
  }

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}