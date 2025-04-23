<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Repair extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var Decimal
  */
  public $advanceAmount;

  /**
   * @var string
   * Defines how repaired item should be returned to customer. Return address is specified in `returnAddress`
  */
  public $collection;

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
   * @var string
   * Defines how repair item will be picked-up from customer and delivered to service. Pick-up address is specified in `pickUpAddress`
  */
  public $delivery;

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
   * @var bool
  */
  public $isRateable;

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
   * @var Decimal
  */
  public $priceEstimated;

  /**
   * @var Decimal
  */
  public $priceEstimatedTaxRate;

  /**
   * @var Rating
  */
  public $rating;

  /**
   * @var string
  */
  public $rma;

  /**
   * @var SecretToken
  */
  public $secretToken;

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