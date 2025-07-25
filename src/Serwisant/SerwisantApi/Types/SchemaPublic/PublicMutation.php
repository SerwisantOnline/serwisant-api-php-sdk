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
   * @param string $activationToken
   * @return AnonymousApplicantActivateResult
   */
  public function activateAnonymousApplicant(string $activationToken, $vars = array())
  {
     return $this->inputArgs('activateAnonymousApplicant', array_merge($vars, ['activationToken' => $activationToken]));
  }

  /**
   * Once customer is created via `createCustomer` he gets an email with activation URL contains a token. Token must be used against this mutation to activate an account and also customer to log-in.
   * @param string $activationToken
   * @return CustomerActivationResult
   */
  public function activateCustomer(string $activationToken, $vars = array())
  {
     return $this->inputArgs('activateCustomer', array_merge($vars, ['activationToken' => $activationToken]));
  }

  /**
   * Creates a customer account usable in `Customer` schema. Account is self-created account. Don't use it for purposes other than customer Panel sign-up.
   * @param CustomerInput $customer
   * @param CustomerAgreementInput[] $agreements
   * @param AddressInput[] $addresses
   * @return CustomerCreationResult
   */
  public function createCustomer(CustomerInput $customer, array $agreements = array(), array $addresses = array(), $vars = array())
  {
     return $this->inputArgs('createCustomer', array_merge($vars, ['customer' => $customer, 'agreements' => $agreements, 'addresses' => $addresses]));
  }

  /**
   * Activate customer panel access for existing customer - set a login and password
   * @param string $activationToken
   * @param string $login
   * @param string $password
   * @param CustomerAgreementInput[] $agreements
   * @return CustomerAccessCreationResult
   */
  public function createCustomerAccess(string $activationToken, string $login, string $password, array $agreements = array(), $vars = array())
  {
     return $this->inputArgs('createCustomerAccess', array_merge($vars, ['activationToken' => $activationToken, 'login' => $login, 'password' => $password, 'agreements' => $agreements]));
  }

  /**
   * @param AnonymousApplicantInput $applicant
   * @param RepairInput $repair
   * @param RepairItemInput[] $additionalItems
   * @param string[] $temporaryFiles
   * @param string $device
   * @param AddressInput $address
   * @return RepairCreationResult
   */
  public function createRepair(AnonymousApplicantInput $applicant, RepairInput $repair, array $additionalItems = array(), array $temporaryFiles = array(), string $device = null, AddressInput $address = null, $vars = array())
  {
     return $this->inputArgs('createRepair', array_merge($vars, ['applicant' => $applicant, 'repair' => $repair, 'additionalItems' => $additionalItems, 'temporaryFiles' => $temporaryFiles, 'device' => $device, 'address' => $address]));
  }

  /**
   * @param FileInput $file
   * @return TemporaryFileCreationResult
   */
  public function createTemporaryFile(FileInput $file, $vars = array())
  {
     return $this->inputArgs('createTemporaryFile', array_merge($vars, ['file' => $file]));
  }

  /**
   * @param AnonymousApplicantInput $applicant
   * @param TicketInput $ticket
   * @param string[] $temporaryFiles
   * @param string $device
   * @param AddressInput $address
   * @return TicketCreationResult
   */
  public function createTicket(AnonymousApplicantInput $applicant, TicketInput $ticket, array $temporaryFiles = array(), string $device = null, AddressInput $address = null, $vars = array())
  {
     return $this->inputArgs('createTicket', array_merge($vars, ['applicant' => $applicant, 'ticket' => $ticket, 'temporaryFiles' => $temporaryFiles, 'device' => $device, 'address' => $address]));
  }

  /**
   * Pay for `OnlinePayment` using any available `type` of payment. Depending on result status, payment may be queued: in that case pool for result, may be asked to redirect user to other site to complete a payment.
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
   * If customer already exists (`login` query will return `INTERNET_ACCESS_NOT_ENABLED`, or `create_customer` ends up with email exists validation error) this mutation can be used to send a secret link points to panel access activation (set up a login and password).
   * @param string $customer
   * @return bool
   */
  public function requestCustomerAccess(string $customer, $vars = array())
  {
     return $this->inputArgs('requestCustomerAccess', array_merge($vars, ['customer' => $customer]));
  }

  /**
   * Give a login or email to get an email with password reset link. Email will contain a reset token to use with `setPassword` mutation. Token is valid for limited time.
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

  /**
   * @param string $token
   * @param RatingInput $rating
   * @return RatingResult
   */
  public function setRating(string $token, RatingInput $rating, $vars = array())
  {
     return $this->inputArgs('setRating', array_merge($vars, ['token' => $token, 'rating' => $rating]));
  }

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}