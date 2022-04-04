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
   * @var Decimal
  */
  public $priceGross;

  /**
   * @var Decimal
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