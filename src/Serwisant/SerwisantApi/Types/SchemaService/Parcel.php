<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Parcel extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $applicationUrl;

  /**
   * @var string
  */
  public $courierName;

  /**
   * @var Decimal
  */
  public $declaredValue;

  /**
   * @var ParcelEdge
  */
  public $deliverTo;

  /**
   * @var string
   * This is a status obtained from external courier service and represent a parcel delivery state.
  */
  public $deliveryStatus;

  /**
   * @var int
  */
  public $depth;

  /**
   * @var int
  */
  public $height;

  /**
   * @var string
   * Internal parcel number, autogenerated.
  */
  public $number;

  /**
   * @var ParcelEdge
  */
  public $pickupFrom;

  /**
   * @var ParcelPickupWindow
  */
  public $pickupTime;

  /**
   * @var ParcelPricing[]
   * Parcel pricing offers. Unless parcel is submitted you'll find there list od couriers accepting this particular parcel and a price they offer. Once parcel is submitted there will be a single entity with chosen courier and price. **Please note**: accessing this field is very expensive - please do not include it into a list of n+1 parcels. This might be included in result of parcel creation, or for single parcel query.
  */
  public $pricing;

  /**
   * @var Repair[]
  */
  public $repairs;

  /**
   * @var string
   * Internal parcel's state.
  */
  public $status;

  /**
   * @var ParcelTrackingEvent[]
   * Tracking events acquired from parcel's courier
  */
  public $tracking;

  /**
   * @var string
   * Parcel's number ad courier tracking service. In general tracking services age public available and number can be used to get current delivery status. Please note: delivery status is tracked, so more-less it should match a `deliveryStatus` field.
  */
  public $trackingNumber;

  /**
   * @var Decimal
  */
  public $weight;

  /**
   * @var int
  */
  public $width;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}