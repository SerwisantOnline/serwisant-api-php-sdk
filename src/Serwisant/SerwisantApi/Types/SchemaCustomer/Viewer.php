<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Viewer extends Types\Type
{
  /**
   * @var Customer
   * Current customer
  */
  public $customer;

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
    return 'SchemaCustomer';
  }
}