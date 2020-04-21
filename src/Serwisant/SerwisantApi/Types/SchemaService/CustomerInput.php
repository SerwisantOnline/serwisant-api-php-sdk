<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

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
  public $group;

  /**
   * @var bool
  */
  public $activateInternetAccess;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}