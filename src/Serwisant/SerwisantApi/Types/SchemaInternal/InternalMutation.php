<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class InternalMutation extends Types\RootType
{
  /**
   * Activate new account
   * @param string $activationToken
   * @param string $salesPartnerCookie
   * @return SubscriberActivationResult
   */
  public function activateSubscriber(string $activationToken, string $salesPartnerCookie = null)
  {
     return $this->inputArgs('activateSubscriber', ['activationToken' => $activationToken, 'salesPartnerCookie' => $salesPartnerCookie]);
  }

  /**
   * Submit a contact message
   * @param ContactMessage $message
   * @return ContactMessageResult
   */
  public function createContactMessage(ContactMessage $message)
  {
     return $this->inputArgs('createContactMessage', ['message' => $message]);
  }

  /**
   * Create access to demo version
   * @param string $email
   * @return DemoAccessResult
   */
  public function createDemoAccess(string $email)
  {
     return $this->inputArgs('createDemoAccess', ['email' => $email]);
  }

  /**
   * Sign-up for a new account
   * @param SubscriberInput $subscriber
   * @param string $activationUrl
   * @return SubscriberCreationResult
   */
  public function createSubscriber(SubscriberInput $subscriber, string $activationUrl)
  {
     return $this->inputArgs('createSubscriber', ['subscriber' => $subscriber, 'activationUrl' => $activationUrl]);
  }

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}