<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelSubmitResult extends Types\Type
{
  /**
   * @var Error[]
  */
  public $errors = [];
  /**
   * @var Parcel
  */
  public $parcel;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}