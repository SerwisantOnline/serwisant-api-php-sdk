<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

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
   * How repair will be delivered to service
  */
  public $delivery;

  /**
   * @var string
   * ID passed from one Address entity points to address where from repair will be picked up
  */
  public $pickUpAddress;

  /**
   * @var string
   * How repair will be returned from service to customer
  */
  public $collection;

  /**
   * @var string
   * ID passed from one Address entity points to address where repair will be returned
  */
  public $returnAddress;

  /**
   * @var string
  */
  public $issue;

  /**
   * @var CustomFieldValueInput[]
  */
  public $customFields = [];
  /**
   * @var string
  */
  public $internalRemarks;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}