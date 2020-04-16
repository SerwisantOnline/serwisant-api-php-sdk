<?php

namespace Serwisant\SerwisantApi;

class SchemaInternal extends Graphql
{
  protected function schemaPath()
  {
    return 'internal';
  }

  public function credentialsCookie($cookie)
  {
    $query = <<<'QUERY'
query credentialsCookie($cookie: String) {
  credentialsCookie(cookie: $cookie) {
    userClass
  }
}
QUERY;
    return $this->callSingle('credentialsCookie', $query, ['cookie' => $cookie]);
  }

  public function createDemoAccess($email)
  {
    $query = <<<'QUERY'
mutation CreateDemoAccess($email: String!) {
  createDemoAccess(email: $email) {
    errors {
      argument
      message
      code
    }
  }
}
QUERY;
    return $this->callSingle('createDemoAccess', $query, ['email' => $email]);
  }

  public function createContactMessage($message)
  {
    $query = <<<'QUERY'
mutation CreateContactMessage($message: ContactMessage!) {
  createContactMessage(message: $message) {
    errors {
      argument
      message
      code
    }
  }
}
QUERY;
    return $this->callSingle('createContactMessage', $query, ['message' => $message]);
  }

  public function activateSubscriber($token, $partner_cookie = null)
  {
    $query = <<<'QUERY'
mutation ActivateSubscriber($token: String!, $partner_cookie: String) {
  activateSubscriber(activationToken: $token, salesPartnerCookie: $partner_cookie) {
    errors {
      argument
      message
      code
    }
    subscriber {
      ID
      companyName
    }
  }
}
QUERY;
    return $this->callSingle('activateSubscriber', $query, [
      'token' => $token,
      'partner_cookie' => $partner_cookie
    ]);
  }

  public function createSubscriber($subscriber, $activation_url)
  {
    $query = <<<'QUERY'
mutation CreateSubscriber($subscriber: SubscriberInput!, $url: String!) {
  createSubscriber(subscriber: $subscriber, activationUrl: $url) {
    errors {
      argument
      message
      code
    }
    subscriber {
      ID
      companyName
      activationToken
    }
  }
}
QUERY;
    return $this->callSingle('createSubscriber', $query, [
      'subscriber' => $subscriber,
      'url' => $activation_url
    ]);
  }

  public function subscriberAgreements($filter = [], $with_content = false)
  {
    $query = <<<'QUERY'
query subscriberAgreements($filter: SubscriberAgreementsFilter, $withContent: Boolean!) {
  subscriberAgreements(filter: $filter) {
    ID
    title
    description
    required
    type
    content @include(if: $withContent)
    attachments {
      ID
      title
      description
      required
      type
      content @include(if: $withContent)
    }
  }
}
QUERY;
    return $this->callSingle('subscriberAgreements', $query, ['filter' => $filter, 'withContent' => $with_content]);
  }

  public function subscriptionLevels()
  {
    $query = <<<'QUERY'
query {
  subscriptionLevels {
    title
    priceNet
    modules {
      description
      longDescription
    }
    optionalModules {
      description
      longDescription
      priceNet
    }
  }
}
QUERY;
    return $this->callSingle('subscriptionLevels', $query);
  }

  public function token($token)
  {
    $query = <<<'QUERY'
query SecretToken($token: String!) {
  secretToken(token: $token) {
    subjectType
    oauthClientId
    oauthClientSecret
    oauthScopes
  }
}
QUERY;
    return $this->callSingle('secretToken', $query, ['token' => $token]);
  }
}
