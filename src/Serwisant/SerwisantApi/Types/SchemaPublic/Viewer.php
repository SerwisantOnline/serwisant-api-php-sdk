<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Viewer extends Types\Type
{
  /**
   * @var Subscriber
  */
  public $subscriber;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}