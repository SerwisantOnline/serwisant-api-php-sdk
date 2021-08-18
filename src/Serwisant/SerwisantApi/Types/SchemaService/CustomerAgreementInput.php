<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerAgreementInput extends Types\Type
{
  /**
   * @var string
   * Agreement's primary key taken from customerAgreements query
  */
  public $customerAgreement;

  /**
   * @var bool
   * True id customer accepts agreement
  */
  public $accepted;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}