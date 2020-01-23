<?php

namespace Serwisant\SerwisantApi;

interface AccessTokenContainer
{

  public function store($access_token, $expiry_timestamp);

  public function get_access_token();

  public function get_expiry_timestamp();
}
