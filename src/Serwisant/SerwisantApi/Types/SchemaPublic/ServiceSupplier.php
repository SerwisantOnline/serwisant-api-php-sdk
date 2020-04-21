<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ServiceSupplier extends Types\Type
{
  /**
   * @var Address
  */
  public $address;

  /**
   * @var Address[]
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
    return 'SchemaPublic';
  }
}