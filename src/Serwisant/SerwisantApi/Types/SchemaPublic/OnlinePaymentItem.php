<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlinePaymentItem extends Types\Type
{
  /**
   * @var Money
  */
  public $amount;

  /**
   * @var string
  */
  public $description;

  /**
   * @var SecretToken
  */
  public $secretToken;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}