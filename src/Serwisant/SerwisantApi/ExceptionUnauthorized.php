<?php

namespace Serwisant\SerwisantApi;

class ExceptionUnauthorized extends Exception
{
  private $handle;

  public function __construct($message, $handle)
  {
    parent::__construct($message, 401);
    $this->handle = $handle;
  }

  public function getHandle()
  {
    return $this->handle;
  }
}