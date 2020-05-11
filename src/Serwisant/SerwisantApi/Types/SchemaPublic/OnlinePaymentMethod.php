<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlinePaymentMethod extends Types\Type
{
  /**
   * @var OnlinePaymentChannel[]
  */
  public $channels = [];
  /**
   * @var Currency
  */
  public $currency;

  /**
   * @var OnlinePaymentMethodType
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}