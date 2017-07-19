<?php

namespace Serwisant\SerwisantApi;

class ConsumerOauth extends Consumer
{
  private $key;
  private $secret;
  private $lang;
  private $version;
  private $client;

  const API_PAGE_LIMIT = 10;

  const FILTER_ORDER_ALL = 'all';
  const FILTER_ORDER_EXPIRED = 'expired';
  const FILTER_ORDER_DELEGATED = 'delegated';
  const FILTER_ORDER_STATUS = 'status';
  const FILTER_ORDER_OPEN = 'open';
  const FILTER_ORDER_INCOMING_SERVICE_SUPPLIER = 'service_supplier';
  const FILTER_ORDER_REPAIRING_SERVICE_SUPPLIER = 'employee_service_supplier';
  const FILTER_ORDER_EMPLOYEE = 'employee';

  const SORT_ORDER_DATE_CREATED = 'date_created';
  const SORT_ORDER_DATE_STARTED = 'date_started';
  const SORT_ORDER_DATE_STARTED_REV = 'date_started_rev';
  const SORT_ORDER_RMA = 'rma';
  const SORT_ORDER_CUSTOMER = 'customer';
  const SORT_ORDER_KIND = 'kind';
  const SORT_ORDER_STATUS = 'status';
  const SORT_ORDER_DAYS_REMAINING = 'days_remaining';
  const SORT_ORDER_UPDATED_AT = 'updated_at';

  public function __construct($key = '', $secret = '', $lang = 'pl', $version = 'v1')
  {
    if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i", $key)) {
      throw new ConsumerException('Invalid OAuth key - to get proper one go to https://serwisant-online.pl/oauth_credentials and create it');
    }
    if (strlen($secret) < 32) {
      throw new ConsumerException('Invalid OAuth secret - to get proper one go to https://serwisant-online.pl/oauth_credentials and create it');
    }
    $this->lang = $lang;
    $this->version = $version;
    $this->client = new HttpClient($key, $secret, $version);
  }

  protected function getClient()
  {
    return $this->client;
  }

  protected function getLang()
  {
    return $this->lang;
  }

  private function orderFilters()
  {
    return [
      self::FILTER_ORDER_ALL,
      self::FILTER_ORDER_EXPIRED,
      self::FILTER_ORDER_DELEGATED,
      self::FILTER_ORDER_STATUS,
      self::FILTER_ORDER_OPEN,
      self::FILTER_ORDER_INCOMING_SERVICE_SUPPLIER,
      self::FILTER_ORDER_REPAIRING_SERVICE_SUPPLIER,
      self::FILTER_ORDER_EMPLOYEE
    ];
  }

  private function orderSorts()
  {
    return [
      self::SORT_ORDER_DATE_CREATED,
      self::SORT_ORDER_DATE_STARTED,
      self::SORT_ORDER_DATE_STARTED_REV,
      self::SORT_ORDER_RMA,
      self::SORT_ORDER_CUSTOMER,
      self::SORT_ORDER_KIND,
      self::SORT_ORDER_STATUS,
      self::SORT_ORDER_DAYS_REMAINING,
      self::SORT_ORDER_UPDATED_AT
    ];
  }

  public function getAllOrders($filter = self::FILTER_ORDER_OPEN, $filter_condition = null, $sort = self::SORT_ORDER_UPDATED_AT)
  {
    $page = 1;
    $all_orders = array();

    do {
      $found_orders = $this->getOrders($page, $filter, $filter_condition, $sort);
      $all_orders = array_merge($all_orders, $found_orders);
      $page = $page+1;
    } while (count($found_orders) >= self::API_PAGE_LIMIT);

    return $all_orders;
  }

  public function getOrders($page = 1, $filter = self::FILTER_ORDER_OPEN, $filter_condition = null, $sort = self::SORT_ORDER_UPDATED_AT)
  {
    $params = [
      'page' => $page,
      'filter' => $filter,
      'sort' => $sort
    ];

    if (!is_numeric($page)) {
        throw new ConsumerException('Page must be a number');
    }
    if (!in_array($filter, $this->orderFilters())) {
      throw new ConsumerException('Filter is invalid');
    }
    if ($filter === self::FILTER_ORDER_STATUS) {
      if (is_numeric($filter_condition)) {
        $params['status_id'] = $filter_condition;
      } else {
        throw new ConsumerException("Order filter {$filter} require status id");
      }
    }
    if (in_array($filter, [self::FILTER_ORDER_DELEGATED, self::FILTER_ORDER_INCOMING_SERVICE_SUPPLIER, self::FILTER_ORDER_REPAIRING_SERVICE_SUPPLIER, self::FILTER_ORDER_EMPLOYEE])) {
      if (is_numeric($filter_condition)) {
        $params['id'] = $filter_condition;
      } else {
        throw new ConsumerException("Order filter {$filter} require id");
      }
    }
    if (!in_array($sort, $this->orderSorts())) {
      throw new ConsumerException('Sorting is invalid');
    }

    return array_map(function($row) { return new Order($row); }, $this->get("/api/{$this->version}/orders", $params));
  }

  public function getOrder($id)
  {
    if (false === is_numeric($id)) {
      throw new ConsumerException('Order id must be a number');
    }
    return new Order($this->get("/api/{$this->version}/orders/{$id}"));
  }
}
