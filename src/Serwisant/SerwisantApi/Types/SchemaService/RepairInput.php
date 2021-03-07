<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairInput extends Types\Type
{
  /**
   * @var string
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
  */
  public $delivery;

  /**
   * @var string
  */
  public $pickUpAddress;

  /**
   * @var string
  */
  public $collection;

  /**
   * @var string
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
  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}