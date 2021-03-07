<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class PublicMutation extends Types\RootType
{
  /**
   * Send there a customer decision regarding estimated repair costs
   * @param string $token
   * @param string $decision
   * @param string $offer
   * @return AcceptOrRejectRepairResult
   */
  public function acceptOrRejectRepair(string $token, string $decision, string $offer = null, $vars = array())
  {
     return $this->inputArgs('acceptOrRejectRepair', array_merge($vars, ['token' => $token, 'decision' => $decision, 'offer' => $offer]));
  }

  /**
   * Once customer is created via `createCustomer` he gets an email with activation URL contains a token.
Token must be used against this mutation to activate an accoint and allo customer to log-in.

   * @param string $activationToken
   * @return CustomerActivationResult
   */
  public function activateCustomer(string $activationToken, $vars = array())
  {
     return $this->inputArgs('activateCustomer', array_merge($vars, ['activationToken' => $activationToken]));
  }

  /**
   * Creates a customer account usable in `Customer` schema. Account is self-created account.
Don't use it for purposes other than customer Panel sign-up.

   * @param CustomerInput $customer
   * @param CustomerAgreementInput[] $agreements
   * @param AddressInput[] $addresses
   * @return CustomerCreationResult
   */
  public function createCustomer(CustomerInput $customer, array $agreements, array $addresses, $vars = array())
  {
     return $this->inputArgs('createCustomer', array_merge($vars, ['customer' => $customer, 'agreements' => $agreements, 'addresses' => $addresses]));
  }

  /**
   * Pay for `OnlinePayment` using any available `type` of payment. Depending on result status, payment may be
queued: in that case pool for result, may be asked to redirect user to other site to complete a payment.

   * @param string $token
   * @param OnlineTransactionInput $onlineTransaction
   * @param string $successUrl
   * @param string $errorUrl
   * @return OnlinePaymentResult
   */
  public function pay(string $token, OnlineTransactionInput $onlineTransaction, string $successUrl, string $errorUrl, $vars = array())
  {
     return $this->inputArgs('pay', array_merge($vars, ['token' => $token, 'onlineTransaction' => $onlineTransaction, 'successUrl' => $successUrl, 'errorUrl' => $errorUrl]));
  }

  /**
   * Give a login or email to get an email with password reset link. Email will contain a reset token to use with `setPassword` mutation.
Token is valid for limited time.

   * @param string $loginOrEmail
   * @param string $subject
   * @return PasswordResetResult
   */
  public function resetPassword(string $loginOrEmail, string $subject, $vars = array())
  {
     return $this->inputArgs('resetPassword', array_merge($vars, ['loginOrEmail' => $loginOrEmail, 'subject' => $subject]));
  }

  /**
   * Use a token sent by `resetPassword` to set a new password.
   * @param string $resetToken
   * @param string $password
   * @param string $passwordConfirmation
   * @return PasswordSetResult
   */
  public function setPassword(string $resetToken, string $password, string $passwordConfirmation, $vars = array())
  {
     return $this->inputArgs('setPassword', array_merge($vars, ['resetToken' => $resetToken, 'password' => $password, 'passwordConfirmation' => $passwordConfirmation]));
  }

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}