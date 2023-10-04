<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketPayment extends Types\Type
{
  /**
   * @var Decimal
  */
  public $amountGross;

  /**
   * @var Decimal
  */
  public $amountNet;

  /**
   * @var Decimal
  */
  public $hoursSpend;

  /**
   * @var bool
  */
  public $paid;

  /**
   * @var Decimal
  */
  public $paymentGross;

  /**
   * @var Decimal
  */
  public $paymentNet;

  /**
   * @var string
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}