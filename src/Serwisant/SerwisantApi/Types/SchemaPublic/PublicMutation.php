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
  public function acceptOrRejectRepair(string $token, AcceptOrRejectRepairDecision $decision, string $offer = null)
  {
     return $this->inputArgs('acceptOrRejectRepair', ['token' => $token, 'decision' => $decision, 'offer' => $offer]);
  }

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}