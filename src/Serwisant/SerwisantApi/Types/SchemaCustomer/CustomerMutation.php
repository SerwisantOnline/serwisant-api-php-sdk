<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerMutation extends Types\RootType
{
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
   * Create new repair as customer. Field `temporaryFiles` takes IDs of temporary files create via `createTemporaryFile `. Temporary files will be attached to repair and persisted.
   * @param RepairInput $repair
   * @param RepairItemInput[] $additionalItems
   * @param string[] $temporaryFiles
   * @return RepairCreationResult
   */
  public function createRepair(RepairInput $repair, array $additionalItems, array $temporaryFiles, $vars = array())
  {
     return $this->inputArgs('createRepair', array_merge($vars, ['repair' => $repair, 'additionalItems' => $additionalItems, 'temporaryFiles' => $temporaryFiles]));
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
   * @return TicketCreationResult
   */
  public function createTicket(TicketInput $ticket, array $temporaryFiles, $vars = array())
  {
     return $this->inputArgs('createTicket', array_merge($vars, ['ticket' => $ticket, 'temporaryFiles' => $temporaryFiles]));
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
   * @param CustomerUpdateInput $customer
   * @param CustomerAgreementUpdateInput[] $agreements
   * @param AddressUpdateInput[] $addresses
   * @return ViewerUpdateResult
   */
  public function updateViewer(array $agreements, array $addresses, CustomerUpdateInput $customer = null, $vars = array())
  {
     return $this->inputArgs('updateViewer', array_merge($vars, ['customer' => $customer, 'agreements' => $agreements, 'addresses' => $addresses]));
  }

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}