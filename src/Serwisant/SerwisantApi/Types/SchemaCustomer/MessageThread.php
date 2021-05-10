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
   * @var DateTime
  */
  public $createdAt;

  /**
   * @var Message[]
  */
  public $messages;

  /**
   * @var string
  */
  public $subject;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}