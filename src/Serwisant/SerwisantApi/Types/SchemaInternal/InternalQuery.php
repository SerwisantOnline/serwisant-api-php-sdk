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
  public function credentialsCookie(string $cookie = null)
  {
     return $this->inputArgs('credentialsCookie', ['cookie' => $cookie]);
  }

  /**
   * @param string $token
   * @return SecretToken
   */
  public function secretToken(string $token)
  {
     return $this->inputArgs('secretToken', ['token' => $token]);
  }

  /**
   * Agreements to accept when creating a new account
   * @param SubscriberAgreementsFilter $filter
   * @return SubscriberAgreement[]
   */
  public function subscriberAgreements(SubscriberAgreementsFilter $filter = null)
  {
     return $this->inputArgs('subscriberAgreements', ['filter' => $filter]);
  }

  /**
   * Subscription levels available for sale
   * @return SubscriptionLevel[]
   */
  public function subscriptionLevels()
  {
     return $this->inputArgs('subscriptionLevels', []);
  }

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}