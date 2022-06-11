<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ServiceQuery extends Types\RootType
{
  /**
   * @param int $limit
   * @param int $page
   * @return ComponentWarehousesResult
   */
  public function componentWarehouses(int $limit = null, int $page = null, $vars = array())
  {
     return $this->inputArgs('componentWarehouses', array_merge($vars, ['limit' => $limit, 'page' => $page]));
  }

  /**
   * List of components in inventory including a deliveries and related data
   * @param int $limit
   * @param int $page
   * @param ComponentsFilter $filter
   * @return ComponentsResult
   */
  public function components(int $limit = null, int $page = null, ComponentsFilter $filter = null, $vars = array())
  {
     return $this->inputArgs('components', array_merge($vars, ['limit' => $limit, 'page' => $page, 'filter' => $filter]));
  }

  /**
   * Will return a list of custom fields, that can be assigned to specific subject like customer or repair
   * @param string $form
   * @return CustomField[]
   */
  public function customFields(string $form, $vars = array())
  {
     return $this->inputArgs('customFields', array_merge($vars, ['form' => $form]));
  }

  /**
   * Return agreements customer should view or accept
   * @param CustomerAgreementsFilter $filter
   * @return CustomerAgreement[]
   */
  public function customerAgreements(CustomerAgreementsFilter $filter = null, $vars = array())
  {
     return $this->inputArgs('customerAgreements', array_merge($vars, ['filter' => $filter]));
  }

  /**
   * Return list of customers filtered with specified conditions
   * @param int $limit
   * @param int $page
   * @param CustomersFilter $filter
   * @param string $sort
   * @return CustomersResult
   */
  public function customers(int $limit = null, int $page = null, CustomersFilter $filter = null, string $sort = null, $vars = array())
  {
     return $this->inputArgs('customers', array_merge($vars, ['limit' => $limit, 'page' => $page, 'filter' => $filter, 'sort' => $sort]));
  }

  /**
   * Return entries for specified dictionary type
   * @param DictionaryEntriesFilter $filter
   * @return Dictionary[]
   */
  public function dictionaryEntries(DictionaryEntriesFilter $filter = null, $vars = array())
  {
     return $this->inputArgs('dictionaryEntries', array_merge($vars, ['filter' => $filter]));
  }

  /**
   * @param int $limit
   * @param int $page
   * @param ParcelsFilter $filter
   * @param string $sort
   * @return ParcelsResult
   */
  public function parcels(int $limit = null, int $page = null, ParcelsFilter $filter = null, string $sort = null, $vars = array())
  {
     return $this->inputArgs('parcels', array_merge($vars, ['limit' => $limit, 'page' => $page, 'filter' => $filter, 'sort' => $sort]));
  }

  /**
   * Return list of repairs filtered with specified conditions
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
   * @var ServiceSupplier[]
  */
  public $serviceSuppliers = [];
  /**
   * Return employee related to current viewer - can be a System employee if token is not related to authenticated employee
   * @return Viewer
   */
  public function viewer($vars = array())
  {
     return $this->inputArgs('viewer', array_merge($vars, []));
  }

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}