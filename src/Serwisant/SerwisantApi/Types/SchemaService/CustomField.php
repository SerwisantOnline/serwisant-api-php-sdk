<?php

namespace Serwisant\SerwisantApi\Types\SchemaService;

use Serwisant\SerwisantApi\Types;

class CustomField extends Types\Obj
{
  /**
   * @var HashID
  */
  public $ID;

  /**
   * @var Dictionary
  */
  public $concern;

  /**
   * @var string
  */
  public $description;

  /**
   * @var CustomFieldForm
  */
  public $form;

  /**
   * @var string
  */
  public $name;

  /**
   * @var bool
  */
  public $required;

  /**
   * @var string[]
  */
  public $selectOptions = [];
  /**
   * @var CustomFieldType
  */
  public $type;

}