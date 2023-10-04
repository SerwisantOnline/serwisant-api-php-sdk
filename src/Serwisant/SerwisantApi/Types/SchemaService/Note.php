<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Note extends Types\Type
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
   * @var DateTime
  */
  public $createdAt;

  /**
   * @var Employee
  */
  public $employee;

  /**
   * @var DateTime
  */
  public $resolvedAt;

  /**
   * @var string
  */
  public $title;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}