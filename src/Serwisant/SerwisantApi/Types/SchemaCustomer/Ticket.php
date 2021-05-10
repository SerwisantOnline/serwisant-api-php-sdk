<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Ticket extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var Address
  */
  public $address;

  /**
   * @var string
  */
  public $addressRemarks;

  /**
   * @var Employee
  */
  public $employee;

  /**
   * @var string
  */
  public $issue;

  /**
   * @var string
  */
  public $number;

  /**
   * @var Priority
  */
  public $priority;

  /**
   * @var TicketStatus
  */
  public $status;

  /**
   * @var Dictionary
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}