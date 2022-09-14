<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class File extends Types\Type
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
   * @var bool
  */
  public $image;

  /**
   * @var string
  */
  public $internalRemarks;

  /**
   * @var bool
  */
  public $public;

  /**
   * @var string
  */
  public $url;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}