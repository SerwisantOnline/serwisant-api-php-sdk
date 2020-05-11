<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlineTransactionPayerInput extends Types\Type
{
  /**
   * @var string
  */
  public $name;

  /**
   * @var string
  */
  public $email;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}