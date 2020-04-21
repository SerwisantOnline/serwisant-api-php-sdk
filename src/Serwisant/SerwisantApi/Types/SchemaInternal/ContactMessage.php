<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ContactMessage extends Types\Type
{
  /**
   * @var string
  */
  public $senderName;

  /**
   * @var string
  */
  public $senderEmail;

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
    return 'SchemaInternal';
  }
}