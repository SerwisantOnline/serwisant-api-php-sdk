<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

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
   * @var DateTime
  */
  public $startAt;

  /**
   * @var CustomFieldValueInput[]
  */
  public $customFields = [];
  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}