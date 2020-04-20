<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Repair extends Types\Type
{
  /**
   * @var float
  */
  public $advanceAmount;

  /**
   * @var RepairTransportType
  */
  public $collectionType;

  /**
   * @var RepairCosts
  */
  public $costs;

  /**
   * @var CustomFieldValue[]
   * Will return a list of values for custom fields
  */
  public $customFields;

  /**
   * @var RepairTransportType
  */
  public $deliveryType;

  /**
   * @var RepairDiagnosis
  */
  public $diagnosis;

  /**
   * @var string
  */
  public $displayName;

  /**
   * @var File[]
   * Files attached to repair. For :service schema it includes private and public files, for otcher schemas only public files are included
  */
  public $files;

  /**
   * @var string
  */
  public $issue;

  /**
   * @var string
  */
  public $model;

  /**
   * @var RepairOffer[]
  */
  public $offers = [];
  /**
   * @var float
  */
  public $priceEstimated;

  /**
   * @var float
  */
  public $priceEstimatedTaxRate;

  /**
   * @var string
  */
  public $rma;

  /**
   * @var string
  */
  public $serial;

  /**
   * @var ServiceSupplier
   * Service supplier who is currently processing this repair
  */
  public $serviceSupplier;

  /**
   * @var RepairStatus
  */
  public $status;

  /**
   * @var RepairSummary
  */
  public $summary;

  /**
   * @var Dictionary
  */
  public $type;

  /**
   * @var string
  */
  public $vendor;

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

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}