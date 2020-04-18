<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi\Types;

class SubscriptionLevel extends Types\Obj
{
  /**
   * @var SubscriptionLevelPaidModule[]
  */
  public $modules;

  /**
   * @var SubscriptionLevelPaidModule[]
  */
  public $optionalModules;

  /**
   * @var float
  */
  public $priceGross;

  /**
   * @var float
  */
  public $priceNet;

  /**
   * @var string
  */
  public $title;

}