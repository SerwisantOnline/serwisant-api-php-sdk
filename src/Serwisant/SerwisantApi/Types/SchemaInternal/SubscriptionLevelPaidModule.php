<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class SubscriptionLevelPaidModule extends Types\Type
{
  /**
   * @var string
  */
  public $description;

  /**
   * @var string
  */
  public $longDescription;

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

  /**
   * @var float
  */
  public $vat;

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}