<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class ServiceMutation extends Types\Obj
{
  /**
   * @var CustomerCreationResult
   * Create a new customer account
  */
  public $createCustomer;

  /**
   * @var FileCreationResult
  */
  public $createFile;

  /**
   * @var RepairCreationResult
   * Create a repair order with some of dependencies
  */
  public $createRepair;

  /**
   * @var RepairStatusUpdateResult
   * Update repair status. Before update check valid statuses in Repair.status.nextPossibleStatus
  */
  public $updateRepairStatus;

}