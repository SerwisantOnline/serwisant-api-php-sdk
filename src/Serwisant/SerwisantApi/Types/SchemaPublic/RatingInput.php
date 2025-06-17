<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RatingInput extends Types\Type
{
  /**
   * @var int
  */
  public $stars;

  /**
   * @var string
  */
  public $comment;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}