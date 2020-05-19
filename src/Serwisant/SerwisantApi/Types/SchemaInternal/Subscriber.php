<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Subscriber extends Types\Type
{
  /**
   * @var int
  */
  public $ID;

  /**
   * @var string
  */
  public $activationToken;

  /**
   * @var Address
  */
  public $address;

  /**
   * @var SubscriberBusinessActivity
  */
  public $businessActivity;

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
   * @var string
  */
  public $number;

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
    return 'SchemaInternal';
  }
}