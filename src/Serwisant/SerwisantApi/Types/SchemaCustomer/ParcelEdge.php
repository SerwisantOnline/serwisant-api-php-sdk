<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelEdge extends Types\Type
{
  /**
   * @var string
  */
  public $company;

  /**
   * @var string
  */
  public $name;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}