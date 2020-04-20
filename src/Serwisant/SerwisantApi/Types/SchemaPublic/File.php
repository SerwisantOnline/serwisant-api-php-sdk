<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class File extends Types\Type
{
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
  public $url;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}