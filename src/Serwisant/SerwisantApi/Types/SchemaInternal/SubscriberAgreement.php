<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class SubscriberAgreement extends Types\Type
{
  /**
   * @var int
  */
  public $ID;

  /**
   * @var SubscriberAgreement[]
  */
  public $attachments;

  /**
   * @var string
  */
  public $content;

  /**
   * @var string
  */
  public $description;

  /**
   * @var bool
  */
  public $required;

  /**
   * @var string
  */
  public $title;

  /**
   * @var string
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}