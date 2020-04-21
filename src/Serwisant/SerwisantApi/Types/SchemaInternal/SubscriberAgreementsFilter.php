<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class SubscriberAgreementsFilter extends Types\Type
{
  /**
   * @var int
  */
  public $ID;

  /**
   * @var LicenceHolderAgreementType
  */
  public $type;

  /**
   * @var bool
  */
  public $forSignup;

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}