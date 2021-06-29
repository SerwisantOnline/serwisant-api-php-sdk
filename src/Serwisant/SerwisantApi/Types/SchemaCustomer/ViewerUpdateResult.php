<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ViewerUpdateResult extends Types\Type
{
  /**
   * @var Error[]
  */
  public $errors = [];
  /**
   * @var Viewer
  */
  public $viewer;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}