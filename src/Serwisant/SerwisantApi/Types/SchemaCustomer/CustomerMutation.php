<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerMutation extends Types\RootType
{
  /**
   * @return RepairCreationResult
   */
  public function createRepair($vars = array())
  {
     return $this->inputArgs('createRepair', array_merge($vars, []));
  }

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}