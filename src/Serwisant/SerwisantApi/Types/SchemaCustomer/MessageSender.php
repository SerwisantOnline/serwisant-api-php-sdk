<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class MessageSender extends Types\Type
{
  /**
   * @var string
  */
  public $displayName;

  /**
   * @var string
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}