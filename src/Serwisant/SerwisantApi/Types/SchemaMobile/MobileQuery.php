<?php

namespace Serwisant\SerwisantApi\Types\SchemaMobile;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class MobileQuery extends Types\RootType
{
  /**
   * Filterable list of tickets submitted by given `deviceUid`
   * @param string $deviceUid
   * @param int $limit
   * @param int $page
   * @param TicketsFilter $filter
   * @param string $sort
   * @return TicketsResult
   */
  public function tickets(string $deviceUid, int $limit = null, int $page = null, TicketsFilter $filter = null, string $sort = null, $vars = array())
  {
     return $this->inputArgs('tickets', array_merge($vars, ['deviceUid' => $deviceUid, 'limit' => $limit, 'page' => $page, 'filter' => $filter, 'sort' => $sort]));
  }

  protected function schemaNamespace()
  {
    return 'SchemaMobile';
  }
}