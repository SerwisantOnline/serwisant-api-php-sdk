<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketInput extends Types\Type
{
  /**
   * @var string
  */
  public $address;

  /**
   * @var string
  */
  public $addressOther;

  /**
   * @var CustomFieldValueInput[]
  */
  public $customFields = [];
  /**
   * @var string
  */
  public $issue;

  /**
   * @var string
  */
  public $priority;

  /**
   * @var DateTime
  */
  public $startAt;

  /**
   * @var bool
  */
  public $wantInvoice;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}