<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class CustomersResult extends Types\Obj
{
  /**
   * @var Customer[]
  */
  public $items;

  /**
   * @var Int
  */
  public $pages;

}