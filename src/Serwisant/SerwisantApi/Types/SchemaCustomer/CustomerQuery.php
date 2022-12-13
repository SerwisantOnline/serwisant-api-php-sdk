<?php

namespace Serwisant\SerwisantApi\Types\SchemaCustomer;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerQuery extends Types\RootType
{
  /**
   * @param string $scope
   * @param string $query
   * @return string[]
   */
  public function autocomplete(string $scope, string $query, $vars = array())
  {
     return $this->inputArgs('autocomplete', array_merge($vars, ['scope' => $scope, 'query' => $query]));
  }

  /**
   * @param string $form
   * @return CustomField[]
   */
  public function customFields(string $form, $vars = array())
  {
     return $this->inputArgs('customFields', array_merge($vars, ['form' => $form]));
  }

  /**
   * @param int $limit
   * @param int $page
   * @param DevicesFilter $filter
   * @param string $sort
   * @return DevicesResult
   */
  public function devices(int $limit = null, int $page = null, DevicesFilter $filter = null, string $sort = null, $vars = array())
  {
     return $this->inputArgs('devices', array_merge($vars, ['limit' => $limit, 'page' => $page, 'filter' => $filter, 'sort' => $sort]));
  }

  /**
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
   * @param MessagesFilter $filter
   * @param string $sort
   * @return MessagesResult
   */
  public function messages(int $limit = null, int $page = null, MessagesFilter $filter = null, string $sort = null, $vars = array())
  {
     return $this->inputArgs('messages', array_merge($vars, ['limit' => $limit, 'page' => $page, 'filter' => $filter, 'sort' => $sort]));
  }

  /**
   * @param PrioritiesFilter $filter
   * @return Priority[]
   */
  public function priorities(PrioritiesFilter $filter = null, $vars = array())
  {
     return $this->inputArgs('priorities', array_merge($vars, ['filter' => $filter]));
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
   * Return details of temporary files identified by ID passed in arguments.
   * @param string[] $ID
   * @return TemporaryFile[]
   */
  public function temporaryFiles(array $ID, $vars = array())
  {
     return $this->inputArgs('temporaryFiles', array_merge($vars, ['ID' => $ID]));
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