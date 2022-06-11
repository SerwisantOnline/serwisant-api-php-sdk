<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelsFilter extends Types\Type
{
  /**
   * @var string
  */
  public $type;

  /**
   * @var string
  */
  public $status;

  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $trackingNumber;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}