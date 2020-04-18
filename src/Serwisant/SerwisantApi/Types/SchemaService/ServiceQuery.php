<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class ServiceQuery extends Types\Obj
{
  /**
   * @var CustomField[]
   * Will return a list of custom fields, that can be assigned to specific subject like customer or repair
  */
  public $customFields;

  /**
   * @var CustomerAgreement[]
   * Return agreements customer should view or accept
  */
  public $customerAgreements;

  /**
   * @var CustomersResult
   * Return list of customers filtered with specified conditions
  */
  public $customers;

  /**
   * @var Dictionary[]
   * Return entries for specified dictionary type
  */
  public $dictionaryEntries;

  /**
   * @var RepairsResult
   * Return list of repairs filtered with specified conditions
  */
  public $repairs;

  /**
   * @var Viewer
   * Return employee related to current viewer - can be a System employee if token is not related to authenticated employee
  */
  public $viewer;

}