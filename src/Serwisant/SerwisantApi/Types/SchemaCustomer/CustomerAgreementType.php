<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerAgreementType extends Types\Enum
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
  const REFUND_POLICY = 'REFUND_POLICY';

  /**
  */
  const CUSTOM_1 = 'CUSTOM_1';

  /**
  */
  const CUSTOM_2 = 'CUSTOM_2';

  /**
  */
  const CUSTOM_3 = 'CUSTOM_3';

  /**
  */
  const CUSTOM_4 = 'CUSTOM_4';

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}