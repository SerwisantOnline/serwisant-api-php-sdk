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
   * Repair creation date - first appear in database
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
   * This is estimated end date - this date is set by service once repair is created. It can differ from real `finishedAt`
  */
  public $finishDateEstimated;

  /**
   * @var bool
  */
  public $finished;

  /**
   * @var string
   * Real date of repair finish. Finish mean transition into WAITING_FOR_COLLECTION or PASSED_FOR_RETURN state.
  */
  public $finishedAt;

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
   * Date when repair was started. For repair delivered by parcel or created via customer panel this will be set once repair will be delivered to service and its status will be set to WAITING_FOR_DIAGNOSIS
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
   * Date when repair was touched last time - repair update, status update, new diagnosis, repair acton will update this date
  */
  public $updatedAt;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}