<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi\Types;

class PublicQuery extends Types\Obj
{
  /**
   * @var CustomerPanelConfig
   * Return a configuration of customer panel related to given token
  */
  public $configByToken;

  /**
   * @var Repair
   * Return detailed information about particular repair
  */
  public $repairByToken;

}