<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class PublicQuery extends Types\RootType
{
  /**
   * Return a configuration of customer panel related to given token
   * @param string $token
   * @return CustomerPanelConfig
   */
  public function configByToken(string $token)
  {
     return $this->inputArgs('configByToken', ['token' => $token]);
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

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}