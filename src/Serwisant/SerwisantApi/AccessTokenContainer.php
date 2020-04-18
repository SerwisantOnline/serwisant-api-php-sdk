<?php

namespace Serwisant\SerwisantApi;

interface AccessTokenContainer
{

  public function store($access_token, $expiry_timestamp);

  public function getAccessToken();

  public function getExpiryTimestamp();
}