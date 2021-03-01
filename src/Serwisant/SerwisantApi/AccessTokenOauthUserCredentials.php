<?php

namespace Serwisant\SerwisantApi;

use GuzzleHttp\Client;

class AccessTokenOauthUserCredentials extends AccessTokenOauth
{
  public function login($login, $password)
  {
    $token_data = $this->createHttp($login, $password);

    if ($token_data !== null) {
      $this->access_token = $token_data['access_token'];

      if ($this->container !== null) {
        $this->container->store($token_data['access_token'], $token_data['expiry'], $token_data['refresh_token']);
      }
    }
  }

  public function logout()
  {
    $this->container->store(null, 0, null);
  }

  /**
   * @throws Exception
   */
  public function refresh()
  {
    // najpierw ustalam, czy mam refresh token w kontenerze, jeśli nie to nic nie mogę zrobić, bo potrzebuję interakcji (login/hasło)
    if ($this->container instanceof AccessTokenContainer && $this->container->getRefreshToken() !== null) {
      $token_data = $this->refreshHttp($this->container->getRefreshToken());

      if ($token_data !== null) {
        $this->access_token = $token_data['access_token'];

        if ($this->container !== null) {
          $this->container->store($token_data['access_token'], $token_data['expiry'], $token_data['refresh_token']);
        }
      }

      return;
    }

    throw new ExceptionUserCredentialsRequired('Please log in');
  }

  private function createHttp($login, $password)
  {
    $params = [
      'grant_type' => 'password',
      'username' => $login,
      'password' => $password,
      'client_id' => $this->client_id,
      'client_secret' => $this->client_secret,
      'scope' => $this->scope
    ];
    return $this->http($params);
  }

  private function refreshHttp($refresh_token)
  {
    $params = [
      'grant_type' => 'refresh_token',
      'refresh_token' => $refresh_token
    ];
    return $this->http($params);
  }
}