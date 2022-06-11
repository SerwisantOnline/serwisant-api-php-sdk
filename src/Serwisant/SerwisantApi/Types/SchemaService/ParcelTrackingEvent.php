<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelTrackingEvent extends Types\Type
{
  /**
   * @var DateTime
  */
  public $date;

  /**
   * @var string
  */
  public $description;

  /**
   * @var string
  */
  public $status;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}