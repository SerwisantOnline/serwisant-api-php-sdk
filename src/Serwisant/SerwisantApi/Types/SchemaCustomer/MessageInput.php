<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class MessageInput extends Types\Type
{
  /**
   * @var string
  */
  public $subject;

  /**
   * @var string
  */
  public $content;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}