<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlineTransactionAgreementsInput extends Types\Type
{
  /**
   * @var bool
  */
  public $dataProcessing;

  /**
   * @var bool
  */
  public $payment;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}