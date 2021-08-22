<?php

namespace Serwisant\SerwisantApi;

class ExceptionAccessDenied extends Exception
{
  private $handle;

  public function __construct($message, $handle)
  {
    parent::__construct($message, 403);
    $this->handle = $handle;
  }

  public function getHandle()
  {
    return $this->handle;
  }
}