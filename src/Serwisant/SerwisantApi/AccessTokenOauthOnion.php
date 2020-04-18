<?php

namespace Serwisant\SerwisantApi;

class AccessTokenOauthOnion implements AccessToken
{
  private $service_or_object_token;
  private $container_inner;
  private $oauth_url;
  private $api_url;

  private $access_token_outer;
  private $access_token_inner;
  private $service_or_object_token_subject;

  /**
   * @param string $service_or_object_token
   * @param string $client_id_outer
   * @param string $client_secret_outer
   * @param string $scope_outer
   * @param AccessTokenContainer|null $container_outer
   * @param AccessTokenContainer|null $container_inner
   * @param string $oauth_url
   * @param string $api_url
   */
  public function __construct($service_or_object_token, $client_id_outer, $client_secret_outer, $scope_outer, AccessTokenContainer $container_outer = null, AccessTokenContainer $container_inner = null, $oauth_url = null, $api_url = null)
  {
    $this->access_token_outer = new AccessTokenOauth(
      $client_id_outer,
      $client_secret_outer,
      $scope_outer,
      $container_outer,
      $oauth_url);

    $this->service_or_object_token = $service_or_object_token;
    $this->container_inner = $container_inner;

    $this->oauth_url = $oauth_url;
    $this->api_url = $api_url;
  }

  /**
   * @return string
   * @throws Exception
   */
  public function get()
  {
    return $this->accessTokenInner()->get();
  }

  /**
   * @throws Exception
   */
  public function refresh()
  {
    $this->accessTokenOuter()->refresh();
    $this->accessTokenInner()->refresh();
  }

  /**
   * @return string
   * @throws Exception
   */
  public function subject()
  {
    $this->get();
    return $this->service_or_object_token_subject;
  }

  /**
   * @return AccessTokenOauth
   */
  private function accessTokenOuter()
  {
    return $this->access_token_outer;
  }

  /**
   * @return AccessTokenOauth
   */
  private function accessTokenInner()
  {
    if ($this->access_token_inner === null) {
      $token = $this->lookupToken();
      $this->service_or_object_token_subject = $token['subjectType'];
      $this->access_token_inner = new AccessTokenOauth(
        $token['oauthClientId'],
        $token['oauthClientSecret'],
        $token['oauthScopes'],
        $this->container_inner,
        $this->oauth_url
      );
    }
    return $this->access_token_inner;
  }

  private function lookupToken()
  {
    $query = <<<'QUERY'
query SecretToken($token: String!) {
  secretToken(token: $token) {
    subjectType
    oauthClientId
    oauthClientSecret
    oauthScopes
  }
}
QUERY;
    $client = new Graphql($this->accessTokenOuter());
    $result = $client->call("{$this->api_url}/internal", $query, ['token' => $this->service_or_object_token]);
    return $result['secretToken'];
  }
}