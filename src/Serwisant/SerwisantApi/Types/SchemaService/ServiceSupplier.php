<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ServiceSupplier extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

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
   * @var bool
  */
  public $hasCompleteData;

  /**
   * @var Phone
  */
  public $phone;

  /**
   * @var string
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}