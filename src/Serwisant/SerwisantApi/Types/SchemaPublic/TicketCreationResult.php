<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TicketCreationResult extends Types\Type
{
  /**
   * @var Error[]
  */
  public $errors = [];
  /**
   * @var Ticket
  */
  public $ticket;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}