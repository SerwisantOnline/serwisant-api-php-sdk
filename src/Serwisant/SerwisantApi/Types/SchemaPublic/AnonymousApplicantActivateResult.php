<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class AnonymousApplicantActivateResult extends Types\Type
{
  /**
   * @var Error[]
  */
  public $errors = [];
  /**
   * @var string
  */
  public $token;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}