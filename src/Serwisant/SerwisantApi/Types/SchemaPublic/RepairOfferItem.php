<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

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
   * @var string
  */
  public $type;

  /**
   * @var float
  */
  public $vat;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}