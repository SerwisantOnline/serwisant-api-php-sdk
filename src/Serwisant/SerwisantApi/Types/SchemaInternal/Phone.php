<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Phone extends Types\Type
{
  /**
   * @var string
   * Country prefix, eg. +48
  */
  public $countryPrefix;

  /**
   * @var string
  */
  public $formatted;

  /**
   * @var bool
  */
  public $isGsm;

  /**
   * @var string
   * Number without country prefix - domestic number
  */
  public $number;

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}