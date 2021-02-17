<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class PublicMutation extends Types\RootType
{
  /**
   * Send there a customer decision regarding estimated repair costs
   * @param string $token
   * @param AcceptOrRejectRepairDecision $decision
   * @param string $offer
   * @return AcceptOrRejectRepairResult
   */
  public function acceptOrRejectRepair(string $token, AcceptOrRejectRepairDecision $decision, string $offer = null, $vars = array())
  {
     return $this->inputArgs('acceptOrRejectRepair', array_merge($vars, ['token' => $token, 'decision' => $decision, 'offer' => $offer]));
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

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}