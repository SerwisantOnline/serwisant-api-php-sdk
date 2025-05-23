<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Device extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var DeviceItem[]
  */
  public $additionalItems;

  /**
   * @var Address
  */
  public $address;

  /**
   * @var File
  */
  public $copyOfSaleDocument;

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
   * @var File[]
  */
  public $files;

  /**
   * @var bool
  */
  public $isVerified;

  /**
   * @var string
  */
  public $model;

  /**
   * @var string
  */
  public $number;

  /**
   * @var string
  */
  public $serial;

  /**
   * @var ServiceSupplier
  */
  public $serviceSupplier;

  /**
   * @var Dictionary
  */
  public $type;

  /**
   * @var string
  */
  public $vendor;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}