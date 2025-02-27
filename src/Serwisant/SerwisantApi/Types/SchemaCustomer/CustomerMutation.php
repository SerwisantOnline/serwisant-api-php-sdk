<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerMutation extends Types\RootType
{
  /**
   * @param string $repair
   * @param string $decision
   * @param string $offer
   * @return AcceptOrRejectRepairResult
   */
  public function acceptOrRejectRepair(string $repair, string $decision, string $offer = null, $vars = array())
  {
     return $this->inputArgs('acceptOrRejectRepair', array_merge($vars, ['repair' => $repair, 'decision' => $decision, 'offer' => $offer]));
  }

  /**
   * Use this mutation to register a new device. Because we don't want trust customer's data created device will be marked as not-verified.
   * @param DeviceInput $device
   * @param AddressInput $address
   * @return DeviceCreationResult
   */
  public function createDevice(DeviceInput $device, AddressInput $address = null, $vars = array())
  {
     return $this->inputArgs('createDevice', array_merge($vars, ['device' => $device, 'address' => $address]));
  }

  /**
   * @param MessageInput $message
   * @return MessageCreationResult
   */
  public function createMessage(MessageInput $message, $vars = array())
  {
     return $this->inputArgs('createMessage', array_merge($vars, ['message' => $message]));
  }

  /**
   * @param string $message
   * @param string $content
   * @return MessageReplyCreationResult
   */
  public function createMessageReply(string $message, string $content = null, $vars = array())
  {
     return $this->inputArgs('createMessageReply', array_merge($vars, ['message' => $message, 'content' => $content]));
  }

  /**
   * Create new repair as customer. 
   * @param RepairInput $repair
   * @param RepairItemInput[] $additionalItems
   * @param string[] $temporaryFiles
   * @param string $device
   * @param AddressInput $address
   * @param RepairCreationOptions $options
   * @return RepairCreationResult
   */
  public function createRepair(RepairInput $repair, array $additionalItems = array(), array $temporaryFiles = array(), string $device = null, AddressInput $address = null, RepairCreationOptions $options = null, $vars = array())
  {
     return $this->inputArgs('createRepair', array_merge($vars, ['repair' => $repair, 'additionalItems' => $additionalItems, 'temporaryFiles' => $temporaryFiles, 'device' => $device, 'address' => $address, 'options' => $options]));
  }

  /**
   * Create a temporary file - file can be attached to created repair and will be persisted. It's useful to scenarios, where files must be uploaded before creation of eg. repair - and persisted with repair.
   * @param FileInput $file
   * @return TemporaryFileCreationResult
   */
  public function createTemporaryFile(FileInput $file, $vars = array())
  {
     return $this->inputArgs('createTemporaryFile', array_merge($vars, ['file' => $file]));
  }

  /**
   * @param TicketInput $ticket
   * @param string[] $temporaryFiles
   * @param string[] $devices
   * @param AddressInput $address
   * @param TicketCreationOptions $options
   * @return TicketCreationResult
   */
  public function createTicket(TicketInput $ticket, array $temporaryFiles = array(), array $devices = array(), AddressInput $address = null, TicketCreationOptions $options = null, $vars = array())
  {
     return $this->inputArgs('createTicket', array_merge($vars, ['ticket' => $ticket, 'temporaryFiles' => $temporaryFiles, 'devices' => $devices, 'address' => $address, 'options' => $options]));
  }

  /**
   * @return ViewerDestructionResult
   */
  public function destroyViewer($vars = array())
  {
     return $this->inputArgs('destroyViewer', array_merge($vars, []));
  }

  /**
   * @param string $message
   * @return bool
   */
  public function markMessageRead(string $message, $vars = array())
  {
     return $this->inputArgs('markMessageRead', array_merge($vars, ['message' => $message]));
  }

  /**
   * @param string $type
   * @param string $ID
   * @return TemporaryFileCreationResult
   */
  public function print(string $type, string $ID, $vars = array())
  {
     return $this->inputArgs('print', array_merge($vars, ['type' => $type, 'ID' => $ID]));
  }

  /**
   * @param CustomerUpdateInput $customer
   * @param CustomerAgreementUpdateInput[] $agreements
   * @param AddressUpdateInput[] $addresses
   * @return ViewerUpdateResult
   */
  public function updateViewer(CustomerUpdateInput $customer = null, array $agreements = array(), array $addresses = array(), $vars = array())
  {
     return $this->inputArgs('updateViewer', array_merge($vars, ['customer' => $customer, 'agreements' => $agreements, 'addresses' => $addresses]));
  }

  /**
   * @param string $currentPassword
   * @param string $password
   * @param string $passwordConfirmation
   * @return ViewerPasswordUpdateResult
   */
  public function updateViewerPassword(string $currentPassword, string $password, string $passwordConfirmation, $vars = array())
  {
     return $this->inputArgs('updateViewerPassword', array_merge($vars, ['currentPassword' => $currentPassword, 'password' => $password, 'passwordConfirmation' => $passwordConfirmation]));
  }

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}