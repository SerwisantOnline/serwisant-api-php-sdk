<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi\Types;

class Phone extends Types\Obj
{
  /**
   * @var string
   * Country prefix, eg. +48
  */
  public $countryPrefix;

  /**
   * @var bool
  */
  public $isGsm;

  /**
   * @var string
   * Number without country prefix - domestic number
  */
  public $number;

}