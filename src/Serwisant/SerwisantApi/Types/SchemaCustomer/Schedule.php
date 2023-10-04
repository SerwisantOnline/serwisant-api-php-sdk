<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Schedule extends Types\Type
{
  /**
   * @var string
  */
  public $concern;

  /**
   * @var Customer
  */
  public $customer;

  /**
   * @var string
  */
  public $description;

  /**
   * @var Device
  */
  public $device;

  /**
   * @var string
  */
  public $title;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}