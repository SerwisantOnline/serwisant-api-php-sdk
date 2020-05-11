<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class OnlinePaymentChannel extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var File
  */
  public $logo;

  /**
   * @var string
  */
  public $name;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}