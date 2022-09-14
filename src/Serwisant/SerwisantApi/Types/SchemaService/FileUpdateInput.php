<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class FileUpdateInput extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var bool
  */
  public $_destroy;

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
  public $payload;

  /**
   * @var bool
  */
  public $public;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}