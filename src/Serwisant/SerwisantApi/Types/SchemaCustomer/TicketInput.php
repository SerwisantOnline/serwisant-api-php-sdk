<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketInput extends Types\Type
{
  /**
   * @var string
  */
  public $issue;

  /**
   * @var string
  */
  public $priority;

  /**
   * @var string
  */
  public $group;

  /**
   * @var DateTime
  */
  public $startAt;

  /**
   * @var CustomFieldValueInput[]
  */
  public $customFields = [];
  /**
   * @var bool
  */
  public $wantInvoice;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}