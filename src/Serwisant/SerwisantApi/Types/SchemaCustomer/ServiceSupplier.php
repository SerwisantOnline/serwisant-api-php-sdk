<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ServiceSupplier extends Types\Type
{
  /**
   * @var Address
   * Main address
  */
  public $address;

  /**
   * @var Address[]
   * All given addresses, including a main one
  */
  public $addresses;

  /**
   * @var File
  */
  public $avatar;

  /**
   * @var string
  */
  public $displayName;

  /**
   * @var string
  */
  public $email;

  /**
   * @var Phone
  */
  public $phone;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}