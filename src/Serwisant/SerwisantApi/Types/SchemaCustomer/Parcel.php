<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Parcel extends Types\Type
{
  /**
   * @var string
  */
  public $courierName;

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
   * @var ParcelEdge
  */
  public $pickupFrom;

  /**
   * @var ParcelPickupWindow
  */
  public $pickupTime;

  /**
   * @var string
   * Internal parcel's state.
  */
  public $status;

  /**
   * @var string
   * Parcel's number ad courier tracking service. In general tracking services age public available and number can be used to get current delivery status. Please note: delivery status is tracked, so more-less it should match a `deliveryStatus` field.
  */
  public $trackingNumber;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}