<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Message extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $content;

  /**
   * @var DateTime
  */
  public $createdAt;

  /**
   * @var MessageSender
  */
  public $sender;

  /**
   * @var MessageThread
  */
  public $thread;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}