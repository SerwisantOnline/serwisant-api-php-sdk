<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class CustomerCreationResult extends Types\Obj
{
  /**
   * @var Customer
  */
  public $customer;

  /**
   * @var Error[]
  */
  public $errors = [];
}