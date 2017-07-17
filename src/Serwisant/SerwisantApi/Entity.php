<?php

namespace Serwisant\SerwisantApi;

use Shudrum\Component\ArrayFinder\ArrayFinder;

class Entity
{
  private $data;
  private $data_finder;

  public function __construct(array $data = array())
  {
    $this->data = $data;
    $this->data_finder = new ArrayFinder($data);
  }

  public function getAsArray()
  {
    return $this->data;
  }

  public function get($key)
  {
    return $this->data_finder->get($key);
  }
}