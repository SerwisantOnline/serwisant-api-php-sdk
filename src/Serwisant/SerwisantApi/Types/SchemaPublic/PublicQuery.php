<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class PublicQuery extends Types\RootType
{
  /**
   * Get a basic customer panel configuration options
   * @return CustomerPanelConfig
   */
  public function configuration($vars = array())
  {
     return $this->inputArgs('configuration', array_merge($vars, []));
  }

  /**
   * List of agreements, eg. GDPR, rules, privacy policy to show/accept during a signup
   * @param CustomerAgreementsFilter $filter
   * @return CustomerAgreement[]
   */
  public function customerAgreements(CustomerAgreementsFilter $filter = null, $vars = array())
  {
     return $this->inputArgs('customerAgreements', array_merge($vars, ['filter' => $filter]));
  }

  /**
   * Will return a list of custom fields for customer signup form - for generic list see customFields in other schemas
   * @return CustomField[]
   */
  public function customerCustomFields($vars = array())
  {
     return $this->inputArgs('customerCustomFields', array_merge($vars, []));
  }

  /**
   * This query map given login credential, ie. email, or login itself to username valid for OAuth password login. Please note: given credential can point to more than one login, so thus must be handled on frontend side.
   * @param string $loginCredential
   * @return LoginResult[]
   */
  public function login(string $loginCredential, $vars = array())
  {
     return $this->inputArgs('login', array_merge($vars, ['loginCredential' => $loginCredential]));
  }

  /**
   * If token belongs to online payment, use this query to get details
   * @param string $token
   * @return OnlinePayment
   */
  public function paymentByToken(string $token, $vars = array())
  {
     return $this->inputArgs('paymentByToken', array_merge($vars, ['token' => $token]));
  }

  /**
   * Return available payment methods for service related to access token. List can be empty, what mean service
doesn't support online payments

   * @return OnlinePaymentMethod[]
   */
  public function paymentMethods($vars = array())
  {
     return $this->inputArgs('paymentMethods', array_merge($vars, []));
  }

  /**
   * @param string $ID
   * @return OnlineTransaction
   */
  public function paymentTransaction(string $ID, $vars = array())
  {
     return $this->inputArgs('paymentTransaction', array_merge($vars, ['ID' => $ID]));
  }

  /**
   * Return detailed information about particular repair
   * @param string $token
   * @return Repair
   */
  public function repairByToken(string $token, $vars = array())
  {
     return $this->inputArgs('repairByToken', array_merge($vars, ['token' => $token]));
  }

  /**
   * Using this query you can lookup a token, to determine where it belongs, eg. order, or payment
   * @param string $token
   * @return SecretToken
   */
  public function secretToken(string $token, $vars = array())
  {
     return $this->inputArgs('secretToken', array_merge($vars, ['token' => $token]));
  }

  /**
   * Information about a service, public registry name, address and branded name, address as well
   * @return Viewer
   */
  public function viewer($vars = array())
  {
     return $this->inputArgs('viewer', array_merge($vars, []));
  }

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}