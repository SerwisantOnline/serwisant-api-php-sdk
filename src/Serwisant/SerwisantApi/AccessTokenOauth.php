<?php

namespace Serwisant\SerwisantApi;

use GuzzleHttp;

class AccessTokenOauth implements AccessToken
{
  protected $client_id;
  protected $client_secret;
  protected $scope;
  protected $container;

  protected $access_token;

  public function __construct(string $client_id, string $client_secret, string $scope = '', AccessTokenContainer $container = null)
  {
    $this->client_id = $client_id;
    $this->client_secret = $client_secret;
    $this->scope = $scope;
    $this->container = $container;
  }

  public function get()
  {
    if ($this->access_token === null) {
      $this->fetch();
    }
    return $this->access_token;
  }

  public function refresh()
  {
    $token_data = $this->createHttp();

    if ($token_data !== null) {
      $this->access_token = $token_data['access_token'];

      if ($this->container !== null) {
        $this->container->store($token_data['access_token'], $token_data['expiry'], $token_data['refresh_token']);
      }
    }
  }

  public function revoke($access_token = null): bool
  {
    $client_params = [
      'connect_timeout' => 5,
      'timeout' => 30,
      'form_params' => [
        'client_id' => $this->client_id,
        'client_secret' => $this->client_secret,
        'token' => $access_token
      ]
    ];

    try {
      $client = new GuzzleHttp\Client();
      $client->request('POST', $this->revokeUrl(), $client_params);
      return true;
    } catch (GuzzleHttp\Exception\ClientException $ex) {
      return false;
    }
  }

  protected function url(): string
  {
    if (trim(getenv('OAUTH_URL'))) {
      return getenv('OAUTH_URL');
    }
    return self::URL;
  }

  protected function revokeUrl(): string
  {
    if (trim(getenv('OAUTH_REVOKE_URL'))) {
      return getenv('OAUTH_REVOKE_URL');
    }
    return self::REVOKE_URL;
  }

  protected function fetch()
  {
    if ($this->container instanceof AccessTokenContainer && $this->container->getExpiryTimestamp() - 10 > time()) {
      $this->access_token = $this->container->getAccessToken();
    }

    if ($this->access_token === null) {
      $this->refresh();
    }
  }

  private function createHttp()
  {
    $params = [
      'grant_type' => 'client_credentials',
      'client_id' => $this->client_id,
      'client_secret' => $this->client_secret,
      'scope' => $this->scope
    ];
    return $this->http($params);
  }

  protected function http($params): array
  {
    $client_params = [
      'connect_timeout' => 5,
      'timeout' => 30,
      'form_params' => $params
    ];

    $client = new GuzzleHttp\Client();

    try {
      $res = $client->request('POST', $this->url(), $client_params);
      $contents = $res->getBody()->getContents();
      $data = json_decode($contents, true);

      if (true === array_key_exists('refresh_token', $data)) {
        $refresh_token = $data['refresh_token'];
      } else {
        $refresh_token = null;
      }

      return [
        'access_token' => $data['access_token'],
        'refresh_token' => $refresh_token,
        'expiry' => ($data['created_at'] + $data['expires_in'])
      ];

    } catch (GuzzleHttp\Exception\ClientException $ex) {
      $http_code = $ex->getResponse()->getStatusCode();

      switch ($http_code) {
        case 400:
        case 401:
          $error = json_decode($ex->getResponse()->getBody()->getContents(), true);
          if ($error['error'] === 'invalid_grant') {
            # niepoprawne login, hasło
            throw new ExceptionUnauthorized($error['error_description'], $error['error']);
          } else {
            # inne sytuacje, niepoprawny key/secret
            throw new ExceptionAccessDenied($error['error_description'], $error['error']);
          }
        default:
          throw new Exception("Unable to fetch an access token, HTTP code was '{$http_code}'");
      }
    }
  }
}
