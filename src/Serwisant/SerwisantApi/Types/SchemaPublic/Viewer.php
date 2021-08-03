<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Viewer extends Types\Type
{
  /**
   * @var Subscriber
   * Information from public registry
  */
  public $subscriber;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}