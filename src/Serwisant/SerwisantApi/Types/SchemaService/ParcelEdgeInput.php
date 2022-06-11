<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ParcelEdgeInput extends Types\Type
{
  /**
   * @var string
  */
  public $name;

  /**
   * @var string
  */
  public $company;

  /**
   * @var PhoneInput
  */
  public $phone;

  /**
   * @var string
  */
  public $email;

  /**
   * @var AddressInput
  */
  public $address;

  /**
   * @var string
   * Give an owner ID name. If this edge is a customer, set here `CUSTOMER` and pass proper customer ID into a `owner` field.
  */
  public $ownerType;

  /**
   * @var string
   * Give here an ID of related owner: customer or service supplier ID, depends on parcel direction.
  */
  public $owner;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}