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
   * @param int $limit
   * @param int $page
   * @param MessagesFilter $filter
   * @return MessagesResult
   */
  public function messages(int $limit = null, int $page = null, MessagesFilter $filter = null, $vars = array())
  {
     return $this->inputArgs('messages', array_merge($vars, ['limit' => $limit, 'page' => $page, 'filter' => $filter]));
  }

  /**
   * @param int $limit
   * @param int $page
   * @param RepairsFilter $filter
   * @param string $sort
   * @return RepairsResult
   */
  public function repairs(int $limit = null, int $page = null, RepairsFilter $filter = null, string $sort = null, $vars = array())
  {
     return $this->inputArgs('repairs', array_merge($vars, ['limit' => $limit, 'page' => $page, 'filter' => $filter, 'sort' => $sort]));
  }

  /**
   * @param int $limit
   * @param int $page
   * @param TicketsFilter $filter
   * @param string $sort
   * @return TicketsResult
   */
  public function tickets(int $limit = null, int $page = null, TicketsFilter $filter = null, string $sort = null, $vars = array())
  {
     return $this->inputArgs('tickets', array_merge($vars, ['limit' => $limit, 'page' => $page, 'filter' => $filter, 'sort' => $sort]));
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