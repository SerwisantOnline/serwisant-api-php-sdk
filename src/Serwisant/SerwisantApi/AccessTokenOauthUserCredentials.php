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

  /**
   * Logs the user out: revokes the stored token on the server and always clears the token locally (container
   * and memory), even when the server refused the revocation.
   *
   * @param string|null $access_token ignored, the token from the container (or memory) is revoked
   * @return bool true when the server confirmed the revocation, false when it refused it or the request failed
   */
  public function revoke($access_token = null): bool
  {
    $token = $this->container instanceof AccessTokenContainer ? $this->container->getAccessToken() : $this->access_token;

    $revoked = $token ? parent::revoke($token) : true;

    $this->clear();
    return $revoked;
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

      try {
        $token_data = $this->http($params);
      } catch (ExceptionUnauthorized $e) {
        // refresh token no longer valid (invalid_grant) - forget the tokens, the user must log in again
        $this->clear();
        throw $e;
      }

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

  private function clear(): void
  {
    $this->access_token = null;
    if ($this->container instanceof AccessTokenContainer) {
      $this->container->store(null, 0, null);
    }
  }
}