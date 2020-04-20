<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class LicenceHolderAgreementType extends Types\Enum
{
  /**
  */
  const RULES = 'RULES';

  /**
  */
  const DATA_PROCESSING = 'DATA_PROCESSING';

  /**
  */
  const MARKETING_DATA_PROCESSING = 'MARKETING_DATA_PROCESSING';

  /**
  */
  const DATA_PROCESSOR = 'DATA_PROCESSOR';

  /**
  */
  const PRIVACY_POLICY = 'PRIVACY_POLICY';

  /**
  */
  const SUB_PROCESSORS = 'SUB_PROCESSORS';

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}