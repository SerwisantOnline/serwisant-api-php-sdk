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