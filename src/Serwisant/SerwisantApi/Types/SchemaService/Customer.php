<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Customer extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

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
  public $companyName;

  /**
   * @var CustomFieldValue[]
   * Will return a list of values for custom fields
  */
  public $customFields;

  /**
   * @var string
  */
  public $displayName;

  /**
   * @var string
  */
  public $email;

  /**
   * @var File[]
  */
  public $files;

  /**
   * @var bool
  */
  public $isAnonymous;

  /**
   * @var string
  */
  public $login;

  /**
   * @var string
  */
  public $person;

  /**
   * @var Phone
  */
  public $phone;

  /**
   * @var ServiceSupplier
   * Service supplier who is default for that customer
  */
  public $serviceSupplier;

  /**
   * @var string
  */
  public $taxId;

  /**
   * @var TaxPrefix
  */
  public $taxPrefix;

  /**
   * @var CustomerType
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}