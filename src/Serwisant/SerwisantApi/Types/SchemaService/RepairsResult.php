<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class RepairsResult extends Types\Obj
{
  /**
   * @var Repair[]
  */
  public $items;

  /**
   * @var Int
  */
  public $pages;

}