<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerQuery extends Types\RootType
{
  /**
   * @param CustomerAgreementsFilter $filter
   * @return CustomerAgreement[]
   */
  public function customerAgreements(CustomerAgreementsFilter $filter = null, $vars = array())
  {
     return $this->inputArgs('customerAgreements', array_merge($vars, ['filter' => $filter]));
  }

  /**
   * Will return a list of custom fields for customer signup form - for generic list see customFields
   * @return CustomField[]
   */
  public function customerCustomFields($vars = array())
  {
     return $this->inputArgs('customerCustomFields', array_merge($vars, []));
  }

  /**
   * Return information about currently logged in customer
   * @return Viewer
   */
  public function viewer($vars = array())
  {
     return $this->inputArgs('viewer', array_merge($vars, []));
  }

  protected function schemaNamespace()
  {
    return 'SchemaCustomer';
  }
}