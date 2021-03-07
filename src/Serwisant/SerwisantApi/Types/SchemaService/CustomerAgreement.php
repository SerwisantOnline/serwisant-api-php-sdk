<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class CustomerAgreement extends Types\Type
{
  /**
   * @var string
  */
  public $ID;

  /**
   * @var string
  */
  public $content;

  /**
   * @var string
  */
  public $description;

  /**
   * @var bool
   * Agreement is required to create Customer, but only if corresponding do CustomerType visibility flag is enabled
  */
  public $required;

  /**
   * @var string
  */
  public $title;

  /**
   * @var string
  */
  public $type;

  /**
   * @var bool
  */
  public $visibleBusiness;

  /**
   * @var bool
  */
  public $visiblePersonal;

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}