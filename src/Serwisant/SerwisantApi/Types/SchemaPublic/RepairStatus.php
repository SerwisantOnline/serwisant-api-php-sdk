<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairStatus extends Types\Type
{
  /**
   * @var bool
  */
  public $canceledOrRejected;

  /**
   * @var bool
  */
  public $confirmed;

  /**
   * @var DateTime
  */
  public $createdAt;

  /**
   * @var int
   * Business days passed from startedAt date
  */
  public $daysFromStart;

  /**
   * @var int
   * Business days to end of repair
  */
  public $daysToEnd;

  /**
   * @var bool
  */
  public $diagnosed;

  /**
   * @var string
  */
  public $displayName;

  /**
   * @var string
  */
  public $finishDateEstimated;

  /**
   * @var bool
  */
  public $finished;

  /**
   * @var float
  */
  public $progress;

  /**
   * @var bool
  */
  public $requireCustomerAccept;

  /**
   * @var string
   * Date when repair was started, for repair delivered by parcel this will differ from createdAt
  */
  public $startedAt;

  /**
   * @var string
  */
  public $status;

  /**
   * @var bool
  */
  public $summedUp;

  /**
   * @var float
  */
  public $timeProgress;

  /**
   * @var string
  */
  public $timeStatus;

  /**
   * @var DateTime
  */
  public $updatedAt;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}