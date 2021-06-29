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
   * @var TicketAction[]
  */
  public $actions;

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
   * @var File[]
  */
  public $files;

  /**
   * @var string
  */
  public $issue;

  /**
   * @var string
  */
  public $number;

  /**
   * @var TicketPayment
  */
  public $payment;

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