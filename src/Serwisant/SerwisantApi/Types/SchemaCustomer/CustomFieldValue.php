<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomFieldValue extends Types\Type
{
  /**
   * @var string
   * Primary key of particular field value to be used for update. NULL value means it's a field created after this entity creation.
  */
  public $ID;

  /**
   * @var CustomField
   * Entity of field definition.
  */
  public $field;

  /**
   * @var string
   * Value of field for this particular object - it's always a string here - look into `field` definition to get proper casting.
  */
  public $value;

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}