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
  public $internetAccess;

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

  /**
   * @var string
   * Time zone of customer, all times wisible for customer should be represented in this time zone
  */
  public $timeZone;

  /**
   * @var string
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}