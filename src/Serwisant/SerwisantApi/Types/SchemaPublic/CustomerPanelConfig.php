<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerPanelConfig extends Types\Type
{
  /**
   * @var bool
  */
  public $caPanelCommunication;

  /**
   * @var bool
  */
  public $caPanelRepairs;

  /**
   * @var bool
  */
  public $caPanelTickets;

  /**
   * @var string
  */
  public $caPanelToken;

  /**
   * @var Currency
   * Service currency, all API prices and other money values are in this currency
  */
  public $currency;

  /**
   * @var bool
  */
  public $showOrderProgressInfo;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}