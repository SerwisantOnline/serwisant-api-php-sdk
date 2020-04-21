<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class SubscriptionLevel extends Types\Type
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

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}