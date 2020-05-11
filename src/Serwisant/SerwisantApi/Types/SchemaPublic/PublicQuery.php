<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class PublicQuery extends Types\RootType
{
  /**
   * @return CustomerPanelConfig
   */
  public function configuration()
  {
     return $this->inputArgs('configuration', []);
  }

  /**
   * @param CustomerAgreementsFilter $filter
   * @return CustomerAgreement[]
   */
  public function customerAgreements(CustomerAgreementsFilter $filter = null)
  {
     return $this->inputArgs('customerAgreements', ['filter' => $filter]);
  }

  /**
   * If token belongs to online payment, use this query to get details
   * @param string $token
   * @return OnlinePayment
   */
  public function paymentByToken(string $token)
  {
     return $this->inputArgs('paymentByToken', ['token' => $token]);
  }

  /**
   * Return available payment methods for service related to access token. List can be empty, what mean service
doesn't support online payments

   * @return OnlinePaymentMethod[]
   */
  public function paymentMethods()
  {
     return $this->inputArgs('paymentMethods', []);
  }

  /**
   * @param string $ID
   * @return OnlineTransaction
   */
  public function paymentTransaction(string $ID)
  {
     return $this->inputArgs('paymentTransaction', ['ID' => $ID]);
  }

  /**
   * Return detailed information about particular repair
   * @param string $token
   * @return Repair
   */
  public function repairByToken(string $token)
  {
     return $this->inputArgs('repairByToken', ['token' => $token]);
  }

  /**
   * Using this query you can lookup a token, to determine where it belongs, eg. order, or payment
   * @param string $token
   * @return SecretToken
   */
  public function secretToken(string $token)
  {
     return $this->inputArgs('secretToken', ['token' => $token]);
  }

  /**
   * @return Viewer
   */
  public function viewer()
  {
     return $this->inputArgs('viewer', []);
  }

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}