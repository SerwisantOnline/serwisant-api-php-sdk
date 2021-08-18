<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerAgreementValue extends Types\Type
{
  /**
   * @var string
   * Primary key to be used to update agreement decision. NULL means this is a new created agreement and customer has no opportunity to make decision.
  */
  public $ID;

  /**
   * @var bool
   * True mean customer accepted agreement
  */
  public $accepted;

  /**
   * @var CustomerAgreement
   * Entity of CustomerAgreement with all agreement details
  */
  public $agreement;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}