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
   * @var string
  */
  public $currency;

  /**
   * @var string
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}