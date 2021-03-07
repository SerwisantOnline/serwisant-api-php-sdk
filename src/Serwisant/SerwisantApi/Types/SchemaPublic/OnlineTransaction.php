<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlineTransaction extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $processorUrl;

  /**
   * @var string
  */
  public $status;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}