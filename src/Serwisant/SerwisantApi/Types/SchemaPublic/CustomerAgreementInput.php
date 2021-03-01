<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerAgreementInput extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var bool
  */
  public $accepted;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}