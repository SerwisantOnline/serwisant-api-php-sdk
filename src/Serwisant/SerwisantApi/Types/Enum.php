<?php

namespace Serwisant\SerwisantApi\Types;

class Enum
{
  private $selection = '';

  public function __construct($selection = null)
  {
    if ($selection) {
      $oClass = new \ReflectionClass(__CLASS__);
      foreach ($oClass->getConstants() as $name => $value) {
        if ($selection === $value) {
          break;
        }
        throw new Exception("Given selection {$selection} id not valid, use only constants defined in class");
      }
      $this->selection = $selection;
    }
  }

  public function enum()
  {
    $oClass = new \ReflectionClass($this);
    return $oClass->getConstants();
  }

  public function __toString()
  {
    return $this->selection ?: '';
  }
}