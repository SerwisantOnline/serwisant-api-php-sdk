<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlinePayment extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var Decimal
   * Full transacion amount, sum of items
  */
  public $amount;

  /**
   * @var Decimal
   * Amount to pay, amount reduced by already paid amounts
  */
  public $amountToPay;

  /**
   * @var string
  */
  public $currency;

  /**
   * @var string
  */
  public $description;

  /**
   * @var OnlinePaymentItem[]
  */
  public $items;

  /**
   * @var string
  */
  public $number;

  /**
   * @var ServiceSupplier
   * Branding name for service handling a payment, it's name communicated to customers on printouts, emails, etc
  */
  public $serviceSupplier;

  /**
   * @var string
  */
  public $status;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}