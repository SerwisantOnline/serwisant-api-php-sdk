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
  public function activateSubscriber(string $activationToken, string $salesPartnerCookie = null, $vars = array())
  {
     return $this->inputArgs('activateSubscriber', array_merge($vars, ['activationToken' => $activationToken, 'salesPartnerCookie' => $salesPartnerCookie]));
  }

  /**
   * Submit a contact message
   * @param ContactMessage $message
   * @return ContactMessageResult
   */
  public function createContactMessage(ContactMessage $message, $vars = array())
  {
     return $this->inputArgs('createContactMessage', array_merge($vars, ['message' => $message]));
  }

  /**
   * Create access to demo version
   * @param string $email
   * @return DemoAccessResult
   */
  public function createDemoAccess(string $email, $vars = array())
  {
     return $this->inputArgs('createDemoAccess', array_merge($vars, ['email' => $email]));
  }

  /**
   * Sign-up for a new account
   * @param SubscriberInput $subscriber
   * @param string $activationUrl
   * @return SubscriberCreationResult
   */
  public function createSubscriber(SubscriberInput $subscriber, string $activationUrl, $vars = array())
  {
     return $this->inputArgs('createSubscriber', array_merge($vars, ['subscriber' => $subscriber, 'activationUrl' => $activationUrl]));
  }

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}