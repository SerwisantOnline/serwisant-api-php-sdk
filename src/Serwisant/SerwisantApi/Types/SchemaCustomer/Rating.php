<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

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
   * @var string
  */
  public $response;

  /**
   * @var int
  */
  public $stars;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}