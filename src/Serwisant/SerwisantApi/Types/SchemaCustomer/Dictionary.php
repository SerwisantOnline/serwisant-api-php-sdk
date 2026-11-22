<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Dictionary extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var bool
   * Entry should be offered as a shortcut in menus, e.g. adding a ticket with preselected category
  */
  public $asMenuItem;

  /**
   * @var string
  */
  public $auxiliaryId;

  /**
   * @var string
  */
  public $name;

  /**
   * @var Priority
   * Ticket priority assigned to TICKET_CATEGORY entry
  */
  public $priority;

  /**
   * @var string
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}