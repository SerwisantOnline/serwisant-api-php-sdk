<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairsFilter extends Types\Type
{
  /**
   * @var string
  */
  public $type;

  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $status;

  /**
   * @var string
  */
  public $q;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}