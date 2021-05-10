<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ComponentDeliveryCreationResult extends Types\Type
{
  /**
   * @var ComponentDelivery[]
  */
  public $deliveries = [];
  /**
   * @var Error[]
  */
  public $errors = [];
  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}