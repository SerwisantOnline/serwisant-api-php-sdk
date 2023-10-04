<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlinePaymentRequestResult extends Types\Type
{
  /**
   * @var Error[]
  */
  public $errors = [];
  /**
   * @var OnlinePayment
  */
  public $onlinePayment;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}