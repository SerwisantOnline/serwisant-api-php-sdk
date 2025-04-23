<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Device extends Types\Type
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
   * @var string
  */
  public $displayName;

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
  public $serial;

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
    return 'SchemaMobile';
  }
}