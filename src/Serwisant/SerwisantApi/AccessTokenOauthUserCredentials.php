<?php

namespace Serwisant\SerwisantApi;

class AccessTokenOauthUserCredentials extends AccessTokenOauth
{
  /**
   * @param $login
   * @param $password
   */
  public function login($login, $password)
  {
    $params = [
      'grant_type' => 'password',
      'username' => $login,
      'password' => $password,
      'client_id' => $this->client_id,
      'client_secret' => $this->client_secret,
      'scope' => $this->scope
    ];

    $token_data = $this->http($params);

    if ($token_data !== null) {
      $this->access_token = $token_data['access_token'];

      if ($this->container !== null) {
        $this->container->store($token_data['access_token'], $token_data['expiry'], $token_data['refresh_token']);
      }
    }
  }

  public function revoke($access_token = null): bool
  {
    if ($this->container instanceof AccessTokenContainer) {
      parent::revoke($this->container->getAccessToken());
    }
    $this->container->store(null, 0, null);
    return true;
  }

  /**
   * @return bool
   * @throws Exception
   */
  public function isAuthenticated(): bool
  {
    try {
      return !!$this->get();
    } catch (ExceptionUserCredentialsRequired | ExceptionUnauthorized $e) {
      return false;
    } catch (Exception $e) {
      throw $e;
    }
  }

  /**
   * @throws Exception
   */
  public function refresh()
  {
    // najpierw ustalam, czy mam refresh token w kontenerze, jeśli nie to nic nie mogę zrobić, bo potrzebuję interakcji (login/hasło)
    if ($this->container instanceof AccessTokenContainer && $this->container->getRefreshToken()) {
      $params = [
        'grant_type' => 'refresh_token',
        'client_id' => $this->client_id,
        'client_secret' => $this->client_secret,
        'refresh_token' => $this->container->getRefreshToken()
      ];

      $token_data = $this->http($params);

      if ($token_data !== null) {
        $this->access_token = $token_data['access_token'];

        if ($this->container !== null) {
          $this->container->store($token_data['access_token'], $token_data['expiry'], $token_data['refresh_token']);
        }
      }

      return;
    }

    throw new ExceptionUserCredentialsRequired;
  }
}