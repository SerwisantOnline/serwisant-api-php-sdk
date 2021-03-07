<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlineTransactionInput extends Types\Type
{
  /**
   * @var string
  */
  public $type;

  /**
   * @var string
  */
  public $code;

  /**
   * @var string
  */
  public $channel;

  /**
   * @var OnlineTransactionPayerInput
  */
  public $payer;

  /**
   * @var OnlineTransactionAgreementsInput
  */
  public $agreements;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}