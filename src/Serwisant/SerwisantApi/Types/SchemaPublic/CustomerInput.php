<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerInput extends Types\Type
{
  /**
   * @var CustomerType
  */
  public $type;

  /**
   * @var string
  */
  public $person;

  /**
   * @var string
  */
  public $companyName;

  /**
   * @var TaxPrefix
  */
  public $taxPrefix;

  /**
   * @var string
  */
  public $taxId;

  /**
   * @var string
  */
  public $email;

  /**
   * @var PhoneInput
  */
  public $phone;

  /**
   * @var CustomFieldValueInput[]
  */
  public $customFields = [];
  /**
   * @var string
  */
  public $login;

  /**
   * @var string
  */
  public $password;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}