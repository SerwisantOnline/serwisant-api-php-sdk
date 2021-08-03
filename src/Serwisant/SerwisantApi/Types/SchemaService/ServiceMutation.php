<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ServiceMutation extends Types\RootType
{
  /**
   * Add a new component into inventory. This is only a component definition (card) - deliveries and other data goes in separate mutations.
   * @param ComponentInput $component
   * @return ComponentCreationResult
   */
  public function createComponent(ComponentInput $component, $vars = array())
  {
     return $this->inputArgs('createComponent', array_merge($vars, ['component' => $component]));
  }

  /**
   * This mutation should be used to add a new stock into a inventory.
Component card created via `createComponent` mutation is required before supply.
`deliveries` argument is an array, so you can add multiple deliveries at once.

   * @param string $component
   * @param ComponentDeliveryInput[] $deliveries
   * @return ComponentDeliveryCreationResult
   */
  public function createComponentDelivery(string $component, array $deliveries, $vars = array())
  {
     return $this->inputArgs('createComponentDelivery', array_merge($vars, ['component' => $component, 'deliveries' => $deliveries]));
  }

  /**
   * Create a new customer account
   * @param CustomerInput $customer
   * @param CustomerAgreementInput[] $agreements
   * @param AddressInput[] $addresses
   * @param FileInput[] $files
   * @return CustomerCreationResult
   */
  public function createCustomer(CustomerInput $customer, array $agreements = array(), array $addresses = array(), array $files = array(), $vars = array())
  {
     return $this->inputArgs('createCustomer', array_merge($vars, ['customer' => $customer, 'agreements' => $agreements, 'addresses' => $addresses, 'files' => $files]));
  }

  /**
   * @param string $subject
   * @param string $subjectType
   * @param FileInput $file
   * @return FileCreationResult
   */
  public function createFile(string $subject, string $subjectType, FileInput $file, $vars = array())
  {
     return $this->inputArgs('createFile', array_merge($vars, ['subject' => $subject, 'subjectType' => $subjectType, 'file' => $file]));
  }

  /**
   * Create a repair order with some of dependencies
   * @param string $customer
   * @param RepairInput $repair
   * @param RepairItemInput[] $additionalItems
   * @param FileInput[] $files
   * @return RepairCreationResult
   */
  public function createRepair(string $customer, RepairInput $repair, array $additionalItems = array(), array $files = array(), $vars = array())
  {
     return $this->inputArgs('createRepair', array_merge($vars, ['customer' => $customer, 'repair' => $repair, 'additionalItems' => $additionalItems, 'files' => $files]));
  }

  /**
   * Update repair status. Before update check valid statuses in Repair.status.nextPossibleStatus
   * @param string $repair
   * @param string $status
   * @return RepairStatusUpdateResult
   */
  public function updateRepairStatus(string $repair, string $status, $vars = array())
  {
     return $this->inputArgs('updateRepairStatus', array_merge($vars, ['repair' => $repair, 'status' => $status]));
  }

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}