<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketStatus extends Types\Type
{
  /**
   * @var DateTime
  */
  public $createdAt;

  /**
   * @var string
   * Human readable status
  */
  public $displayName;

  /**
   * @var DateTime
   * Real finish time, remarks are the same as for `started_on`
  */
  public $finishedAt;

  /**
   * @var DateTime
  */
  public $scheduledOn;

  /**
   * @var DateTime
  */
  public $scheduledTo;

  /**
   * @var DateTime
   * Real start time based on status change - please note: if ticket status will not be updated or it will be updated post-factum date may be inaccurate
  */
  public $startedOn;

  /**
   * @var string
   * Ticket status as enum, use it to comparisons or other logic
  */
  public $status;

  protected function schemaNamespace()
  {
    return 'SchemaMobile';
  }
}