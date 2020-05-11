<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class ServiceQuery extends Types\RootType
{
  /**
   * Will return a list of custom fields, that can be assigned to specific subject like customer or repair
   * @param CustomFieldForm $form
   * @return CustomField[]
   */
  public function customFields(CustomFieldForm $form)
  {
     return $this->inputArgs('customFields', ['form' => $form]);
  }

  /**
   * Return agreements customer should view or accept
   * @param CustomerAgreementsFilter $filter
   * @return CustomerAgreement[]
   */
  public function customerAgreements(CustomerAgreementsFilter $filter = null)
  {
     return $this->inputArgs('customerAgreements', ['filter' => $filter]);
  }

  /**
   * Return list of customers filtered with specified conditions
   * @param int $limit
   * @param int $page
   * @param CustomersFilter $filter
   * @param CustomersSort $sort
   * @return CustomersResult
   */
  public function customers(int $limit = null, int $page = null, CustomersFilter $filter = null, CustomersSort $sort = null)
  {
     return $this->inputArgs('customers', ['limit' => $limit, 'page' => $page, 'filter' => $filter, 'sort' => $sort]);
  }

  /**
   * Return entries for specified dictionary type
   * @param DictionaryEntriesFilter $filter
   * @return Dictionary[]
   */
  public function dictionaryEntries(DictionaryEntriesFilter $filter = null)
  {
     return $this->inputArgs('dictionaryEntries', ['filter' => $filter]);
  }

  /**
   * Return list of repairs filtered with specified conditions
   * @param int $limit
   * @param int $page
   * @param RepairsFilter $filter
   * @param RepairsSort $sort
   * @return RepairsResult
   */
  public function repairs(int $limit = null, int $page = null, RepairsFilter $filter = null, RepairsSort $sort = null)
  {
     return $this->inputArgs('repairs', ['limit' => $limit, 'page' => $page, 'filter' => $filter, 'sort' => $sort]);
  }

  /**
   * Return employee related to current viewer - can be a System employee if token is not related to authenticated employee
   * @return Viewer
   */
  public function viewer()
  {
     return $this->inputArgs('viewer', []);
  }

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}