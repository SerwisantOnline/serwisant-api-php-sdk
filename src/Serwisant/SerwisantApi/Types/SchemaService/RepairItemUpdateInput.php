<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairItemUpdateInput extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var bool
  */
  public $_destroy;

  /**
   * @var string
  */
  public $type;

  /**
   * @var string
  */
  public $serial;

  /**
   * @var string
  */
  public $description;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}