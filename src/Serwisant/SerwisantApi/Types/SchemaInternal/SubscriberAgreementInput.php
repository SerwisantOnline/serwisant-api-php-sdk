<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class SubscriberAgreementInput extends Types\Type
{
  /**
   * @var int
  */
  public $ID;

  /**
   * @var bool
  */
  public $accepted;

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}