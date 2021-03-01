<?php

namespace Serwisant\SerwisantApi;

interface AccessTokenContainer
{

  public function store($access_token, $expiry_timestamp, $refresh_token = null);

  public function getAccessToken();

  public function getRefreshToken();

  public function getExpiryTimestamp();
}