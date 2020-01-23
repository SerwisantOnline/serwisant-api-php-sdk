<?php

namespace Serwisant\SerwisantApi;

class AccessToken
{
  const URL = 'https://serwisant.online/oauth/token';

  private $url;
  private $client_id;
  private $client_secret;
  private $scope;
  private $container;

  private $access_token;

  public function __construct($client_id, $client_secret, $scope = '', AccessTokenContainer $container = null, $url = null)
  {
    if (is_null($url)) {
      $this->url = URL;
    } else {
      $this->url = $url;
    }
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

  private function fetch()
  {
    if ($this->container instanceof AccessTokenContainer && $this->container->get_expiry_timestamp() > time()) {
      $this->access_token = $this->container->get_access_token();
    }

    if ($this->access_token === null) {
      $this->refresh();
    }
  }

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

    $client = new \GuzzleHttp\Client();

    $res = $client->request('POST', $this->url, $client_params);
    $code = $res->getStatusCode();

    if ($code === 200) {
      $data = json_decode($res->getBody()->getContents(), true);
      return [
        'access_token' => $data['access_token'],
        'expiry' => ($data['created_at'] + $data['expires_in'])
      ];
    } else {
      throw new Exception("Unable to fetch an access token, HTTP code was '{$code}'");
    }
  }
}
