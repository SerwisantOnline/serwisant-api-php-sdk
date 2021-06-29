<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketAction extends Types\Type
{
  /**
   * @var Decimal
  */
  public $hoursSpend;

  /**
   * @var DateTime
  */
  public $performedAt;

  /**
   * @var string
  */
  public $remarks;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}