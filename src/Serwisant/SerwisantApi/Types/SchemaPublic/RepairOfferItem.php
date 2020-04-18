<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi\Types;

class RepairOfferItem extends Types\Obj
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

}