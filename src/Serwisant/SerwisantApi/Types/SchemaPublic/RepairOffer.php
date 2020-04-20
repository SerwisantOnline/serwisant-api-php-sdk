<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairOffer extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var bool
  */
  public $accepted;

  /**
   * @var string
  */
  public $description;

  /**
   * @var RepairOfferItem[]
  */
  public $items;

  /**
   * @var string
  */
  public $number;

  /**
   * @var float
  */
  public $priceGross;

  /**
   * @var float
   * Summary net price for this offer. If offered repair was diagnosed, diagnosis price is included here.
  */
  public $priceNet;

  /**
   * @var string
  */
  public $title;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}