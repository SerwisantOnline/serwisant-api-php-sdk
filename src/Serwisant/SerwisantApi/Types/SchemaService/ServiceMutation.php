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
   * @param string $subject
   * @param string $subjectType
   * @param NoteInput $note
   * @return NoteCreationResult
   */
  public function createNote(NoteInput $note, string $subject = null, string $subjectType = null, $vars = array())
  {
     return $this->inputArgs('createNote', array_merge($vars, ['subject' => $subject, 'subjectType' => $subjectType, 'note' => $note]));
  }

  /**
   * Add new parcel do database. Parcel, after creation is not ordered yet. Call `submitParcel` to pass a parcel to external courier system. As a result a `Parcel` entity is returned, so you can add and fetch parcel pricing in single request. Parcel must be related with one or more `Repair`
   * @param ParcelInput $parcel
   * @param ParcelEdgeInput $pickupFrom
   * @param ParcelEdgeInput $deliverTo
   * @param string[] $repairs
   * @return ParcelCreationResult
   */
  public function createParcel(ParcelInput $parcel, ParcelEdgeInput $pickupFrom, ParcelEdgeInput $deliverTo, array $repairs, $vars = array())
  {
     return $this->inputArgs('createParcel', array_merge($vars, ['parcel' => $parcel, 'pickupFrom' => $pickupFrom, 'deliverTo' => $deliverTo, 'repairs' => $repairs]));
  }

  /**
   * Create a repair order with some of dependencies
   * @param string $customer
   * @param RepairInput $repair
   * @param RepairItemInput[] $additionalItems
   * @param FileInput[] $files
   * @param string $device
   * @return RepairCreationResult
   */
  public function createRepair(string $customer, RepairInput $repair, array $additionalItems = array(), array $files = array(), string $device = null, $vars = array())
  {
     return $this->inputArgs('createRepair', array_merge($vars, ['customer' => $customer, 'repair' => $repair, 'additionalItems' => $additionalItems, 'files' => $files, 'device' => $device]));
  }

  /**
   * @param string $repair
   * @param string $serviceSupplier
   * @param RepairDelegationInput $delegation
   * @return RepairDelegationCreationResult
   */
  public function createRepairDelegation(string $repair, string $serviceSupplier, RepairDelegationInput $delegation, $vars = array())
  {
     return $this->inputArgs('createRepairDelegation', array_merge($vars, ['repair' => $repair, 'serviceSupplier' => $serviceSupplier, 'delegation' => $delegation]));
  }

  /**
   * @param string $repair
   * @param RepairDiagnosisInput $diagnosis
   * @return RepairDiagnosisCreationResult
   */
  public function createRepairDiagnosis(string $repair, RepairDiagnosisInput $diagnosis, $vars = array())
  {
     return $this->inputArgs('createRepairDiagnosis', array_merge($vars, ['repair' => $repair, 'diagnosis' => $diagnosis]));
  }

  /**
   * @param string $repair
   * @param RepairSummaryInput $summary
   * @return RepairSummaryCreationResult
   */
  public function createRepairSummary(string $repair, RepairSummaryInput $summary, $vars = array())
  {
     return $this->inputArgs('createRepairSummary', array_merge($vars, ['repair' => $repair, 'summary' => $summary]));
  }

  /**
   * Generate PDF files for repair, ticket protocols and shipping documents for parcel. ID of entity should be obtained from query. Mutation will return an URL to document. Please note: URLs have short lifetime. Document must be downloaded up to 10 minutes from mutation call.
   * @param string $type
   * @param string $ID
   * @return TemporaryFileCreationResult
   */
  public function print(string $type, string $ID, $vars = array())
  {
     return $this->inputArgs('print', array_merge($vars, ['type' => $type, 'ID' => $ID]));
  }

  /**
   * @param string $subject
   * @param string $subjectType
   * @param Decimal $amount
   * @param string $description
   * @return OnlinePaymentRequestResult
   */
  public function requestOnlinePayment(string $subject, string $subjectType, Decimal $amount, string $description = null, $vars = array())
  {
     return $this->inputArgs('requestOnlinePayment', array_merge($vars, ['subject' => $subject, 'subjectType' => $subjectType, 'amount' => $amount, 'description' => $description]));
  }

  /**
   * @param string $note
   * @return bool
   */
  public function resolveNote(string $note, $vars = array())
  {
     return $this->inputArgs('resolveNote', array_merge($vars, ['note' => $note]));
  }

  /**
   * @param string $parcel
   * @param string $pricing
   * @return ParcelSubmitResult
   */
  public function submitParcel(string $parcel, string $pricing, $vars = array())
  {
     return $this->inputArgs('submitParcel', array_merge($vars, ['parcel' => $parcel, 'pricing' => $pricing]));
  }

  /**
   * @param string $ID
   * @param NoteInput $note
   * @return NoteUpdateResult
   */
  public function updateNote(string $ID, NoteInput $note, $vars = array())
  {
     return $this->inputArgs('updateNote', array_merge($vars, ['ID' => $ID, 'note' => $note]));
  }

  /**
   * @param string $ID
   * @param string $customer
   * @param RepairUpdateInput $repair
   * @param RepairItemUpdateInput[] $additionalItems
   * @param FileUpdateInput[] $files
   * @return RepairUpdateResult
   */
  public function updateRepair(string $ID, string $customer = null, RepairUpdateInput $repair = null, array $additionalItems = array(), array $files = array(), $vars = array())
  {
     return $this->inputArgs('updateRepair', array_merge($vars, ['ID' => $ID, 'customer' => $customer, 'repair' => $repair, 'additionalItems' => $additionalItems, 'files' => $files]));
  }

  /**
   * @param string $repair
   * @param RepairDelegationInput $delegation
   * @return RepairDelegationUpdateResult
   */
  public function updateRepairDelegation(string $repair, RepairDelegationInput $delegation, $vars = array())
  {
     return $this->inputArgs('updateRepairDelegation', array_merge($vars, ['repair' => $repair, 'delegation' => $delegation]));
  }

  /**
   * @param string $repair
   * @param string $status
   * @return RepairDelegationStatusResult
   */
  public function updateRepairDelegationStatus(string $repair, string $status, $vars = array())
  {
     return $this->inputArgs('updateRepairDelegationStatus', array_merge($vars, ['repair' => $repair, 'status' => $status]));
  }

  /**
   * @param string $repair
   * @param RepairDiagnosisInput $diagnosis
   * @return RepairDiagnosisUpdateResult
   */
  public function updateRepairDiagnosis(string $repair, RepairDiagnosisInput $diagnosis, $vars = array())
  {
     return $this->inputArgs('updateRepairDiagnosis', array_merge($vars, ['repair' => $repair, 'diagnosis' => $diagnosis]));
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

  /**
   * @param string $repair
   * @param RepairSummaryInput $summary
   * @return RepairSummaryUpdateResult
   */
  public function updateRepairSummary(string $repair, RepairSummaryInput $summary, $vars = array())
  {
     return $this->inputArgs('updateRepairSummary', array_merge($vars, ['repair' => $repair, 'summary' => $summary]));
  }

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}