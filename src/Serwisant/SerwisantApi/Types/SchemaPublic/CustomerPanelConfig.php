<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerPanelConfig extends Types\Type
{
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
  public $internalTransportEnabled;

  /**
   * @var bool
  */
  public $orderDictModel;

  /**
   * @var bool
   * True when service want to use a messaging system in customer panel
  */
  public $panelCommunication;

  /**
   * @var bool
  */
  public $panelDevices;

  /**
   * @var bool
   * Is access to customer panel enables
  */
  public $panelEnabled;

  /**
   * @var bool
   * True if service want to use repairs module
  */
  public $panelRepairs;

  /**
   * @var bool
   * True if service allow to customer self-register - False must disable signup possibility
  */
  public $panelSignups;

  /**
   * @var bool
   * True if service want to use ticketing module
  */
  public $panelTickets;

  /**
   * @var string
  */
  public $panelToken;

  /**
   * @var bool
  */
  public $personalTransportEnabled;

  /**
   * @var string
  */
  public $repairSubmitPrompt;

  /**
   * @var string
  */
  public $repairSubmitPromptContent;

  /**
   * @var bool
  */
  public $requirePhoneNumber;

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
  public $uploadFiles;

  /**
   * @var bool
  */
  public $uploadOnlyImages;

  /**
   * @var bool
  */
  public $useCustomStatusNames;

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