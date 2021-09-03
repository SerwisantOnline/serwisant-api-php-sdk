<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerStatement extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $content;

  /**
   * @var string
  */
  public $title;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}