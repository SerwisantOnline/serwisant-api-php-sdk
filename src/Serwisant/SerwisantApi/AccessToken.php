<?php

namespace Serwisant\SerwisantApi;

interface AccessToken
{
  const HOST = 'serwisant.online';

  public function get();

  public function refresh();

  public function revoke($access_token = null): bool;

  public function setHttpHeaders(array $http_headers);
}
