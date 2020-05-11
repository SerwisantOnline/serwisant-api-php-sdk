<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Subscriber extends Types\Type
{
  /**
   * @var Address
  */
  public $address;

  /**
   * @var string
  */
  public $companyName;

  /**
   * @var string
  */
  public $displayName;

  /**
   * @var string
  */
  public $email;

  /**
   * @var ServiceSupplier
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

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}