<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

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
   * @var AnonymousApplicant
  */
  public $applicant;

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
    return 'SchemaMobile';
  }
}