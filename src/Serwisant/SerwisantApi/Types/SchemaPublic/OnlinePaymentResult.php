<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlinePaymentResult extends Types\Type
{
  /**
   * @var Error[]
  */
  public $errors = [];
  /**
   * @var OnlineTransaction
  */
  public $onlineTransaction;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}