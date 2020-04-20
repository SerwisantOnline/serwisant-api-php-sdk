<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerPanelConfig extends Types\Type
{
  /**
   * @var bool
  */
  public $showOrderProgressInfo;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}