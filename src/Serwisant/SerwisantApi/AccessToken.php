<?php

namespace Serwisant\SerwisantApi;

interface AccessToken
{
  const URL = 'https://serwisant.online/oauth/token';

  public function get();

  public function refresh();
}
