<?php

namespace Serwisant\SerwisantApi;

use Serwisant\SerwisantApi\Types\SchemaInternal;

class AccessTokenOauthOnion implements AccessToken
{
  private $internal_access_token;
  private $service_or_object_token;
  private $service_container;
  private $oauth_url;
  private $api_url;

  private $service_access_token;
  private $secret_token;

  /**
   * @param string $service_or_object_token
   * @param string $internal_client_id
   * @param string $internal_secret
   * @param string $internal_scope
   * @param AccessTokenContainer|null $internal_container
   * @param AccessTokenContainer|null $service_container
   * @param string $oauth_url
   * @param string $api_url
   */
  public function __construct($service_or_object_token, $internal_client_id, $internal_secret, $internal_scope, AccessTokenContainer $internal_container = null, AccessTokenContainer $service_container = null, $oauth_url = null, $api_url = null)
  {
    $this->internal_access_token = new AccessTokenOauth(
      $internal_client_id,
      $internal_secret,
      $internal_scope,
      $internal_container,
      $oauth_url);

    $this->service_or_object_token = $service_or_object_token;
    $this->service_container = $service_container;
    $this->oauth_url = $oauth_url;
    $this->api_url = $api_url;
  }

  /**
   * @return string
   * @throws Exception
   * @throws ExceptionNotFound
   * @throws Types\Exception
   */
  public function get()
  {
    return $this->serviceAccessToken()->get();
  }

  /**
   * @throws Exception
   * @throws ExceptionNotFound
   * @throws Types\Exception
   */
  public function refresh()
  {
    $this->internalAccessToken()->refresh();
    $this->serviceAccessToken()->refresh();
  }

  /**
   * @return Types\SchemaInternal\SecretToken
   * @throws Exception
   * @throws ExceptionNotFound
   * @throws Types\Exception
   */
  public function secretToken()
  {
    $this->get();
    return $this->secret_token;
  }

  /**
   * @return AccessTokenOauth
   */
  private function internalAccessToken()
  {
    return $this->internal_access_token;
  }

  /**
   * @return AccessTokenOauth
   */
  private function serviceAccessToken()
  {
    if ($this->service_access_token === null) {
      $this->secret_token = $this->getSecretTokenUsingOuterAccessToken();

      $this->service_access_token = new AccessTokenOauth(
        $this->secret_token->oauthClientId,
        $this->secret_token->oauthClientSecret,
        $this->secret_token->oauthScopes,
        $this->service_container,
        $this->oauth_url
      );
    }
    return $this->service_access_token;
  }

  /**
   * @return SchemaInternal\SecretToken
   */
  private function getSecretTokenUsingOuterAccessToken()
  {
    $client = new GraphqlClient($this->internalAccessToken());
    $query = new SchemaInternal\InternalQuery($client, $this->api_url);
    return $query->secretToken($this->service_or_object_token);
  }
}