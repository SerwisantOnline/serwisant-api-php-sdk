<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class DeviceInput extends Types\Type
{
  /**
   * @var CustomFieldValueInput[]
  */
  public $customFields = [];
  /**
   * @var string
   * Upload temporary file with document, then pass here `ID` of `TemporaryFile` entity.
  */
  public $copyOfSaleDocumentTemporaryFile;

  /**
   * @var string
   * `ID` passed from one of `REPAIR_SUBJECT_TYPE` `Dictionary` entity. Please note - device has no special type - it shares types with repairs.
  */
  public $type;

  /**
   * @var string
  */
  public $vendor;

  /**
   * @var string
  */
  public $model;

  /**
   * @var string
  */
  public $serial;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}