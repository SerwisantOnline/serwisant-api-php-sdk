<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairOfferItem extends Types\Type
{
  /**
   * @var string
  */
  public $description;

  /**
   * @var float
  */
  public $priceGross;

  /**
   * @var float
  */
  public $priceNet;

  /**
   * @var RepairOfferItemType
  */
  public $type;

  /**
   * @var float
  */
  public $vat;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}