<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class AnonymousApplicantInput extends Types\Type
{
  /**
   * @var string
  */
  public $deviceUid;

  /**
   * @var string
  */
  public $person;

  /**
   * @var PhoneInput
  */
  public $phone;

  /**
   * @var string
  */
  public $email;

  /**
   * @var CustomerAgreementInput[]
  */
  public $agreements = [];
  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}