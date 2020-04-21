<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class SubscriberInput extends Types\Type
{
  /**
   * @var string
  */
  public $companyName;

  /**
   * @var string
  */
  public $person;

  /**
   * @var string
  */
  public $email;

  /**
   * @var string
  */
  public $phone;

  /**
   * @var string
  */
  public $promoCode;

  /**
   * @var string
  */
  public $login;

  /**
   * @var string
  */
  public $password;

  /**
   * @var SubscriberBusinessActivity
  */
  public $businessActivity;

  /**
   * @var SubscriberAgreementInput[]
  */
  public $agreements;

  protected function schemaNamespace()
  {
    return 'SchemaInternal';
  }
}