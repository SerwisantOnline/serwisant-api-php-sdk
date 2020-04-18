<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi\Types;

class RepairStatus extends Types\Obj
{
  /**
   * @var DateTime
  */
  public $createdAt;

  /**
   * @var Int
   * Business days passed from startedAt date
  */
  public $daysFromStart;

  /**
   * @var Int
   * Business days to end of repair
  */
  public $daysToEnd;

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
   * if true repair was unsuccessful
  */
  public $isCanceledOrRejected;

  /**
   * @var bool
   * true means repair costs from diagnosis was at some point confirmed by customer
  */
  public $isConfirmed;

  /**
   * @var bool
   * true says repair has a diagnosis and service marked diagnosis as complete
  */
  public $isDiagnosed;

  /**
   * @var bool
   * true says repair is finished and can be collected or will be/was passed to remote delivery
  */
  public $isFinished;

  /**
   * @var bool
   * true means repair has a summary with public description and a final price
  */
  public $isSummedUp;

  /**
   * @var float
  */
  public $progress;

  /**
   * @var string
   * Date when repair was started, for repair delivered by parcel this will differ from createdAt
  */
  public $startedAt;

  /**
   * @var RepairState
  */
  public $status;

  /**
   * @var OrderTimeStatus
  */
  public $timeStatus;

}