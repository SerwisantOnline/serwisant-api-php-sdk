<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class MessageThread extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var int
  */
  public $allMessages;

  /**
   * @var DateTime
  */
  public $createdAt;

  /**
   * @var DateTime
  */
  public $lastMessageAt;

  /**
   * @var Message[]
  */
  public $messages;

  /**
   * @var MessageRecipient[]
  */
  public $recipients;

  /**
   * @var string
  */
  public $subject;

  /**
   * @var int
  */
  public $unreadMessages;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}