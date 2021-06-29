<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketPayment extends Types\Type
{
  /**
   * @var Money
  */
  public $amountGross;

  /**
   * @var Money
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
   * @var Money
  */
  public $paymentGross;

  /**
   * @var Money
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