<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerAgreementUpdateInput extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $customerAgreement;

  /**
   * @var bool
  */
  public $accepted;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}