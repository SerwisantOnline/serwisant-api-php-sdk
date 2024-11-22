<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Rating extends Types\Type
{
  /**
   * @var string
  */
  public $comment;

  /**
   * @var string
  */
  public $date;

  /**
   * @var int
  */
  public $stars;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}