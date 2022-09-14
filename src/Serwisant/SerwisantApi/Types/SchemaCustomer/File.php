<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

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
  public $publicRemarks;

  /**
   * @var string
  */
  public $url;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}