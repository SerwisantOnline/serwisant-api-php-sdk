<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class TemporaryFile extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $contentType;

  /**
   * @var string
  */
  public $name;

  /**
   * @var string
  */
  public $url;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}