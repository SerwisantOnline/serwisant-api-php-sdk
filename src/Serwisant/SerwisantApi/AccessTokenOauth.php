<?php

namespace Serwisant\SerwisantApi;

use GuzzleHttp;

class AccessTokenOauth implements AccessToken
{
  protected $client_id;
  protected $client_secret;
  protected $scope;
  protected $container;

  private $ip;
  private $lang;

  protected $access_token;

  public function __construct(string $client_id, string $client_secret, string $scope = '', AccessTokenContainer $container = null)
  {
    $this->client_id = $client_id;
    $this->client_secret = $client_secret;
    $this->scope = $scope;
    $this->container = $container;
  }

  public function setIp($ip)
  {
    $this->ip = $ip;
    return $this;
  }

  public function setLang($lang)
  {
    $this->lang = $lang;
    return $this;
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
    $params = [
      'grant_type' => 'client_credentials',
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
    $params = [
      'client_id' => $this->client_id,
      'client_secret' => $this->client_secret,
      'token' => $access_token
    ];

    try {
      $client = new GuzzleHttp\Client();
      $client->request('POST', $this->revokeUrl(), $this->clientOptions($this->revokeUrl(), $params));
      return true;
    } catch (\GuzzleHttp\Exception\GuzzleException $e) {
      return false;
    }
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

  /**
   * @param $params
   * @return array
   * @throws Exception
   * @throws ExceptionAccessDenied
   * @throws ExceptionTooManyRequests
   * @throws ExceptionUnauthorized
   */
  protected function http($params): array
  {
    try {
      $client = new GuzzleHttp\Client();
      $options = $this->clientOptions($this->url(), $params);
      $res = $client->request('POST', $this->url(), $options);
    } catch (\GuzzleHttp\Exception\GuzzleException $e) {
      throw new Exception($e->getMessage());
    }

    $http_code = $res->getStatusCode();

    switch ($http_code) {
      case 200:
        $data = json_decode($res->getBody()->getContents(), true);

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

      case 400:
      case 401:
        $error = json_decode($res->getBody()->getContents(), true);

        if ($error['error'] === 'invalid_grant') {
          # niepoprawne login, hasło
          throw new ExceptionUnauthorized($error['error_description'], $error['error']);
        } else {
          # inne sytuacje, niepoprawny key/secret
          throw new ExceptionAccessDenied($error['error_description'], $error['error']);
        }

      case 429:
        throw new ExceptionTooManyRequests();

      default:
        throw new Exception("Unable to fetch an access token, HTTP code was '{$http_code}'");
    }
  }

  private function clientOptions($url, $params)
  {
    $headers = [];

    if (trim((string)$this->ip) !== '') {
      $headers['X-API-Client-IP'] = $this->ip;
    }
    if (trim((string)$this->lang) !== '') {
      $headers['Accept-Language'] = $this->lang;
    }

    $timeout = intval(getenv('HTTP_TIMEOUT'));
    if ($timeout <= 0) {
      $timeout = 30;
    }

    return [
      'http_errors' => false,
      'connect_timeout' => ceil($timeout / 5),
      'timeout' => $timeout,
      'form_params' => $params,
      'headers' => $headers,
      'verify' => parse_url($url, PHP_URL_HOST) == self::HOST // for custom API URL skip SSL verification
    ];
  }
}
