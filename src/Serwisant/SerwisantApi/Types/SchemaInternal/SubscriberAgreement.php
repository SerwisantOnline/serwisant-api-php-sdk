<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi\Types;

class SubscriberAgreement extends Types\Obj
{
  /**
   * @var Int
  */
  public $ID;

  /**
   * @var SubscriberAgreement[]
  */
  public $attachments;

  /**
   * @var string
  */
  public $content;

  /**
   * @var string
  */
  public $description;

  /**
   * @var bool
  */
  public $required;

  /**
   * @var string
  */
  public $title;

  /**
   * @var LicenceHolderAgreementType
  */
  public $type;

}