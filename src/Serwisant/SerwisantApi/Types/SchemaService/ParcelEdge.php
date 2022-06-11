<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelEdge extends Types\Type
{
  /**
   * @var ParcelAddress
  */
  public $address;

  /**
   * @var string
  */
  public $company;

  /**
   * @var Customer
  */
  public $customer;

  /**
   * @var string
  */
  public $email;

  /**
   * @var string
  */
  public $name;

  /**
   * @var string
  */
  public $ownerType;

  /**
   * @var Phone
  */
  public $phone;

  /**
   * @var ServiceSupplier
  */
  public $serviceSupplier;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}