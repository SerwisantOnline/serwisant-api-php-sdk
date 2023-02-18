<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ScheduleDate extends Types\Type
{
  /**
   * @var string
  */
  public $date;

  /**
   * @var Schedule
  */
  public $schedule;

  /**
   * @var Ticket
  */
  public $ticket;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}