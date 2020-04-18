<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class Dictionary extends Types\Obj
{
  /**
   * @var HashID
  */
  public $ID;

  /**
   * @var string
  */
  public $name;

  /**
   * @var DictionaryType
  */
  public $type;

}