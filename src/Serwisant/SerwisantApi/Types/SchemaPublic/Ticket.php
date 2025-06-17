<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class Ticket extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var Address
  */
  public $address;

  /**
   * @var string
  */
  public $addressRemarks;

  /**
   * @var CustomFieldValue[]
   * Will return a list of values for custom fields
  */
  public $customFields;

  /**
   * @var Device[]
  */
  public $devices;

  /**
   * @var File[]
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
  public $number;

  /**
   * @var Priority
  */
  public $priority;

  /**
   * @var Rating
  */
  public $rating;

  /**
   * @var SecretToken
  */
  public $secretToken;

  /**
   * @var ServiceSupplier
  */
  public $serviceSupplier;

  /**
   * @var TicketStatus
  */
  public $status;

  /**
   * @var Dictionary
  */
  public $type;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}