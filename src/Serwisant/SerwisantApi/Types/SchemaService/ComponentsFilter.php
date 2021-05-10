<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ComponentsFilter extends Types\Type
{
  /**
   * @var string
   * Choose one of confition you want to use as filter, then pass corresponding value into other field. Default value is `ALL`
  */
  public $type;

  /**
   * @var string
   * Use `ID` as `type` and pass comppnent id to field to get a single component.
  */
  public $ID;

  /**
   * @var string
   * Generic search, use `SEARCH` as type, and pass there any string to search components database
  */
  public $q;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}