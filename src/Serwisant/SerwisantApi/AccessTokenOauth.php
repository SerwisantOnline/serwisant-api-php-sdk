<?php

namespace Serwisant\SerwisantApi;

use GuzzleHttp\Client;

class AccessTokenOauth implements AccessToken
{
  const URL = 'https://serwisant.online/oauth/token';

  private $url;
  private $client_id;
  private $client_secret;
  private $scope;
  private $container;

  private $access_token;

  /**
   * @param string $client_id
   * @param string $client_secret
   * @param string $scope
   * @param AccessTokenContainer|null $container
   * @param string $url
   */
  public function __construct($client_id, $client_secret, $scope = '', AccessTokenContainer $container = null, $url = null)
  {
    if (is_null($url)) {
      $this->url = self::URL;
    } else {
      $this->url = $url;
    }
    $this->client_id = $client_id;
    $this->client_secret = $client_secret;
    $this->scope = $scope;
    $this->container = $container;
  }

  /**
   * @return string
   * @throws Exception
   */
  public function get()
  {
    if ($this->access_token === null) {
      $this->fetch();
    }
    return $this->access_token;
  }

  /**
   * @throws Exception
   */
  private function fetch()
  {
    if ($this->container instanceof AccessTokenContainer && $this->container->getExpiryTimestamp() > time()) {
      $this->access_token = $this->container->getAccessToken();
    }

    if ($this->access_token === null) {
      $this->refresh();
    }
  }

  /**
   * @throws Exception
   */
  public function refresh()
  {
    $token_data = $this->fetch_http();
    if ($token_data !== null) {
      $this->access_token = $token_data['access_token'];

      if ($this->container !== null) {
        $this->container->store($token_data['access_token'], $token_data['expiry']);
      }
    }
  }

  /**
   * @return array
   * @throws Exception
   */
  private function fetch_http()
  {
    $params = [
      'grant_type' => 'client_credentials',
      'client_id' => $this->client_id,
      'client_secret' => $this->client_secret,
      'scope' => $this->scope
    ];

    $client_params = [
      'connect_timeout' => 5,
      'timeout' => 30,
      'form_params' => $params
    ];

    $client = new Client();

    $res = $client->request('POST', $this->url, $client_params);
    $code = $res->getStatusCode();

    if ($code === 200) {
      $contents = $res->getBody()->getContents();
      $data = json_decode($contents, true);

      return [
        'access_token' => $data['access_token'],
        'expiry' => ($data['ts'] + $data['expires_in'])
      ];
    } else {
      throw new Exception("Unable to fetch an access token, HTTP code was '{$code}'");
    }
  }
}
