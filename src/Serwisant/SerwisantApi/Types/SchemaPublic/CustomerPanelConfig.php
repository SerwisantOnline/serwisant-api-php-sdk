<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerPanelConfig extends Types\Type
{
  /**
   * @var bool
   * True when service want to use a messaging system in customer panel
  */
  public $caPanelCommunication;

  /**
   * @var bool
   * True if service want to use repairs module
  */
  public $caPanelRepairs;

  /**
   * @var bool
   * True if service allow to customer self-register - False must disable signup possibility
  */
  public $caPanelSignups;

  /**
   * @var bool
   * True if service want to use ticketing module
  */
  public $caPanelTickets;

  /**
   * @var string
  */
  public $caPanelToken;

  /**
   * @var string
   * Service currency, all API prices and other money values are in this currency
  */
  public $currency;

  /**
   * @var string
   * Message to be shown after login - only for authorised users
  */
  public $dashboardMessage;

  /**
   * @var bool
  */
  public $orderDictModel;

  /**
   * @var bool
  */
  public $showOrderProgressInfo;

  /**
   * @var bool
  */
  public $showRepairDelegation;

  /**
   * @var bool
  */
  public $uploadOnlyImages;

  /**
   * @var string
   * Message to be shown before login - for every user
  */
  public $welcomeMessage;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}