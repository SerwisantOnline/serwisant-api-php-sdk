<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerPanelConfig extends Types\Type
{
  /**
   * @var Currency
   * Service currency, all API prices and other money values are in this currency
  */
  public $currency;

  /**
   * @var bool
  */
  public $showOrderProgressInfo;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}