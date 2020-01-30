<?php

namespace Serwisant\SerwisantApi;

class AccessTokenOauthOnion implements AccessToken
{
  private $secret_token;
  private $container_inner;
  private $oauth_url;
  private $api_url;

  private $access_token_outer;
  private $access_token_inner;
  private $secret_token_subject;

  public function __construct($secret_token, $client_id_outer, $client_secret_outer, $scope_outer, AccessTokenContainer $container_outer = null, $container_inner = null, $oauth_url = null, $api_url = null)
  {
    $this->access_token_outer = new AccessTokenOauth($client_id_outer, $client_secret_outer, $scope_outer, $container_outer, $oauth_url);

    $this->secret_token = $secret_token;
    $this->container_inner = $container_inner;
    $this->oauth_url = $oauth_url;
    $this->api_url = $api_url;
  }

  public function get()
  {
    return $this->access_token_inner()->get();
  }

  public function refresh()
  {
    $this->access_token_outer()->refresh();
    $this->access_token_inner()->refresh();
  }

  public function subject()
  {
    $this->get();
    return $this->secret_token_subject;
  }

  private function access_token_outer()
  {
    $this->access_token_outer;
  }

  private function access_token_inner()
  {
    if ($this->access_token_inner === null) {
      $internal_schema = new \Serwisant\SerwisantApi\SchemaInternal($this->access_token_outer, $this->api_url);
      $token = $internal_schema->token($this->secret_token);

      $this->access_token_inner = new AccessTokenOauth(
        $token['oauthClientId'],
        $token['oauthClientSecret'],
        $token['oauthScopes'],
        $this->container_inner,
        $this->oauth_url
      );

      $this->secret_token_subject = $token['subjectType'];
    }

    return $this->access_token_inner;
  }
}