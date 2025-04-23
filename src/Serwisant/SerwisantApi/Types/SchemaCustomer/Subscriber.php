<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Subscriber extends Types\Type
{
  /**
   * @var Address
  */
  public $address;

  /**
   * @var string
  */
  public $businessActivity;

  /**
   * @var string
  */
  public $companyName;

  /**
   * @var string
   * Formatted legal name
  */
  public $displayName;

  /**
   * @var string
  */
  public $email;

  /**
   * @var ServiceSupplier
   * Data of main service supplier - branded - this is a data for customer information
  */
  public $serviceSupplier;

  /**
   * @var string
  */
  public $taxId;

  /**
   * @var string
  */
  public $taxPrefix;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}