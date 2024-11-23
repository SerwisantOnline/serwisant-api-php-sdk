<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Viewer extends Types\Type
{
  /**
   * @var ServiceSupplier
   * Service supplier dedicated for handling all repairs - it can be differ from main service supplier
  */
  public $repairsServiceSupplier;

  /**
   * @var Subscriber
   * Information from public registry
  */
  public $subscriber;

  /**
   * @var ServiceSupplier
   * Service supplier dedicated for handling ticketing - it can be differ from main service supplier
  */
  public $ticketsServiceSupplier;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}