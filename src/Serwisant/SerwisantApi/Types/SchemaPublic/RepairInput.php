<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairInput extends Types\Type
{
  /**
   * @var string
   * ID passed from one of REPAIR_SUBJECT_TYPE Dictionary entity
  */
  public $type;

  /**
   * @var string
  */
  public $vendor;

  /**
   * @var string
  */
  public $model;

  /**
   * @var string
  */
  public $serial;

  /**
   * @var bool
  */
  public $warranty;

  /**
   * @var string
  */
  public $warrantyPurchaseDate;

  /**
   * @var string
  */
  public $warrantyPurchaseDocument;

  /**
   * @var string
   * Defines how repair item will be picked-up from customer and delivered to service. Pick-up address is specified in `pickUpAddress`
  */
  public $delivery;

  /**
   * @var string
   * Defines how repaired item should be returned to customer. Return address is specified in `returnAddress`
  */
  public $collection;

  /**
   * @var string
  */
  public $issue;

  /**
   * @var CustomFieldValueInput[]
  */
  public $customFields = [];
  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}