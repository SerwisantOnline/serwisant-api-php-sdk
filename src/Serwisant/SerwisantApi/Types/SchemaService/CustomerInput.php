<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerInput extends Types\Type
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
   * @var CustomFieldValueInput[]
  */
  public $customFields = [];
  /**
   * @var string
   * Customer's group, ID passed from one of CUSTOMER_GROUP Dictionary entity
  */
  public $group;

  /**
   * @var bool
   * By default it's false - when set tu true with customer will be activated access to customer panel - login and password will be sent to customer's email.
  */
  public $activateInternetAccess;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}