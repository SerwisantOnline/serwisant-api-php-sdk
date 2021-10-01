<?php

namespace Serwisant\SerwisantApi;

interface AccessToken
{
  const HOST = 'serwisant.online';
  const URL = 'https://serwisant.online/oauth/token';
  const REVOKE_URL = 'https://serwisant.online/oauth/revoke';

  public function get();

  public function refresh();

  public function revoke($access_token = null): bool;
}
