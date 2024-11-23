<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomFieldType extends Types\Enum
{
  /**
   * Single line text
  */
  const TEXT = 'TEXT';

  /**
   * Option
  */
  const CHECKBOX = 'CHECKBOX';

  /**
   * Single choice list
  */
  const SELECT = 'SELECT';

  /**
   * Multi line text
  */
  const TEXTAREA = 'TEXTAREA';

  /**
   * Password (will be encrypted)
  */
  const PASSWORD = 'PASSWORD';

  /**
   * Date picker
  */
  const DATE = 'DATE';

  protected function schemaNamespace()
  {
    return 'SchemaMobile';
  }
}