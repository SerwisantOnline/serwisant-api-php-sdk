<?php

namespace Serwisant\SerwisantApi;

class SchemaInternal extends Graphql
{
  protected function schemaPath()
  {
    return 'internal';
  }

  public function repairByToken($token)
  {
    $query = 'query repairByToken($token: String!) {
                    repairByToken(token: $token) {
                      serviceSupplier {
                        displayName
                        address {
                          street
                          building
                          city
                          postalCode
                          countryIso
                        }
                        phone {
                          number
                          countryPrefix
                        }
                        email
                        avatar {
                          url
                        }
                      }
                      rma
                      displayName
                      type {
                        name
                      }
                      advanceAmount
                      deliveryType
                      collectionType
                      issue
                      priceEstimated
                      priceEstimatedTaxRate
                      serial
                      vendor
                      model
                      warranty
                      warrantyPurchaseDate
                      warrantyPurchaseDocument
                      customFields {
                        field {
                          name
                          description
                          type
                        }
                        value
                      }
                      status {
                        status
                        displayName
                        progress
                        createdAt
                        startedAt
                        daysFromStart
                        finishDateEstimated
                        timeStatus
                      }
                      costs {
                        proposedNet
                        proposedGross
                        estimatedNet
                        estimatedGross
                        confirmed
                        finalNet
                        finalGross
                      }
                      diagnosis {
                        publicRemarks
                      }
                      summary {
                        publicRemarks
                      }
                      offers {
                        ID
                        number
                        title
                        description
                        priceNet
                        priceGross
                        accepted
                        items {
                          description
                          priceNet
                          vat
                          priceGross
                          type
                        }
                      }
                    }
                  }';
    return $this->call_single('repairByToken', $query, ['token' => $token]);
  }

  public function credentialsCookie($cookie)
  {
    $query = 'query credentialsCookie($cookie: String) {
                      credentialsCookie(cookie: $cookie) {
                        userClass
                      }
                    }';
    return $this->call_single('credentialsCookie', $query, ['cookie' => $cookie]);
  }

  public function createDemoAccess($email)
  {
    $query = 'mutation CreateDemoAccess($email: String!) {
                    createDemoAccess(email: $email) {
                      errors {
                        argument
                        message
                        code
                      }
                    }
                  }';
    return $this->call_single('createDemoAccess', $query, ['email' => $email]);
  }

  public function createContactMessage($message)
  {
    $query = 'mutation CreateContactMessage($message: ContactMessage!) {
                    createContactMessage(message: $message) {
                      errors {
                        argument
                        message
                        code
                      }
                    }
                  }';
    return $this->call_single('createContactMessage', $query, ['message' => $message]);
  }

  public function activateSubscriber($token, $partner_cookie = null)
  {
    $query = 'mutation ActivateSubscriber($token: String!, $partner_cookie: String) {
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
                  }';
    return $this->call_single('activateSubscriber', $query, [
      'token' => $token,
      'partner_cookie' => $partner_cookie
    ]);
  }

  public function createSubscriber($subscriber, $activation_url)
  {
    $query = 'mutation CreateSubscriber($subscriber: SubscriberInput!, $url: String!) {
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
                  }';
    return $this->call_single('createSubscriber', $query, [
      'subscriber' => $subscriber,
      'url' => $activation_url
    ]);
  }

  public function subscriberAgreements($filter = [], $with_content = false)
  {
    $query = 'query subscriberAgreements($filter: SubscriberAgreementsFilter, $withContent: Boolean!) {
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
                  }';
    return $this->call_single('subscriberAgreements', $query, ['filter' => $filter, 'withContent' => $with_content]);
  }

  public function subscriptionLevels()
  {
    $query = 'query {
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
                }';
    return $this->call_single('subscriptionLevels', $query);
  }
}
