<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Repair extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var RepairItem[]
  */
  public $additionalItems;

  /**
   * @var Decimal
  */
  public $advanceAmount;

  /**
   * @var string
  */
  public $applicationUrl;

  /**
   * @var Address
   * Address where service should pick up a repair item. Empty if `collectionType` type is `PERSONAL`
  */
  public $collectionAddress;

  /**
   * @var string
   * Defines how repair item will be collected from customer.
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
   * @var Customer
  */
  public $customer;

  /**
   * @var RepairDelegation
  */
  public $delegation;

  /**
   * @var Address
   * Address where repaired item should be returned. Empty if `deliveryType` type is `PERSONAL`
  */
  public $deliveryAddress;

  /**
   * @var string
   * Defines how repaired item should be returned to customer.
  */
  public $deliveryType;

  /**
   * @var Device
  */
  public $device;

  /**
   * @var RepairDiagnosis
  */
  public $diagnosis;

  /**
   * @var string
  */
  public $displayName;

  /**
   * @var Employee
  */
  public $employee;

  /**
   * @var File[]
   * Files attached to repair. For :service schema it includes private and public files, for otcher schemas only public files are included
  */
  public $files;

  /**
   * @var string
  */
  public $internalRemarks;

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
   * @var Note[]
  */
  public $notes;

  /**
   * @var RepairOffer[]
  */
  public $offers = [];
  /**
   * @var Parcel[]
  */
  public $parcels = [];
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
    return 'SchemaService';
  }
}