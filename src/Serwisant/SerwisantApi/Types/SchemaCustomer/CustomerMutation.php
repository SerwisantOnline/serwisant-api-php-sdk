<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerMutation extends Types\RootType
{
  /**
   * @param RepairInput $repair
   * @param RepairItemInput[] $additionalItems
   * @param FileInput[] $files
   * @return RepairCreationResult
   */
  public function createRepair(RepairInput $repair, array $additionalItems, array $files, $vars = array())
  {
     return $this->inputArgs('createRepair', array_merge($vars, ['repair' => $repair, 'additionalItems' => $additionalItems, 'files' => $files]));
  }

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}