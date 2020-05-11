<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlinePayment extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var Money
   * Full transacion amount, sum of items
  */
  public $amount;

  /**
   * @var Money
   * Amount to pay, amount reduced by already paid amounts
  */
  public $amountToPay;

  /**
   * @var Currency
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
   * @var OnlinePaymentStatus
  */
  public $status;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}