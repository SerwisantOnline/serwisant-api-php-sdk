<?php

namespace Serwisant\SerwisantApi;

interface AccessToken
{

  public function get();

  public function refresh();
}
