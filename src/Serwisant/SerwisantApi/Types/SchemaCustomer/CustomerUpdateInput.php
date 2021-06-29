<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerUpdateInput extends Types\Type
{
  /**
   * @var string
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
   * @var string
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
   * @var CustomFieldValueUpdateInput[]
  */
  public $customFields = [];
  /**
   * @var string
  */
  public $password;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}