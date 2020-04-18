<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi\Types;

class PublicMutation extends Types\Obj
{
  /**
   * @var AcceptOrRejectRepairResult
   * Send there a customer decision regarding estimated repair costs
  */
  public $acceptOrRejectRepair;

}