<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class AnonymousApplicant extends Types\Type
{
  /**
   * @var string
  */
  public $anonymizedEmail;

  /**
   * @var string
  */
  public $anonymizedPhone;

  protected function schemaNamespace()
  {
    return 'SchemaMobile';
  }
}