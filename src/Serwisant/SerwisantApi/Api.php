<?php

namespace Serwisant\SerwisantApi;

class Api
{
  private $http_headers = [];
  private $load_paths = [];
  private $client;
  private $access_token;
  private $debug = 0;

  /**
   * @param int $level
   * @return $this
   */
  public function setDebug(int $level)
  {
    $this->debug = $level;
    return $this;
  }

  /**
   * @param array $http_headers
   * @return $this
   */
  public function setHttpHeaders(array $http_headers)
  {
    $this->http_headers = $http_headers;
    return $this;
  }

  /**
   * @param $path
   * @return $this
   */
  public function addLoadPath($path)
  {
    $this->load_paths[] = $path;
    return $this;
  }

  /**
   * @param $access_token
   * @return $this
   */
  public function setAccessToken(AccessToken $access_token)
  {
    $this->access_token = $access_token;
    return $this;
  }

  public function publicMutation()
  {
    return new Types\SchemaPublic\PublicMutation($this->client(), $this->load_paths, $this->debug);
  }

  public function publicQuery()
  {
    return new Types\SchemaPublic\PublicQuery($this->client(), $this->load_paths, $this->debug);
  }

  public function serviceMutation()
  {
    return new Types\SchemaService\ServiceMutation($this->client(), $this->load_paths, $this->debug);
  }

  public function serviceQuery()
  {
    return new Types\SchemaService\ServiceQuery($this->client(), $this->load_paths, $this->debug);
  }

  public function internalMutation()
  {
    return new Types\SchemaInternal\InternalMutation($this->client(), $this->load_paths, $this->debug);
  }

  public function internalQuery()
  {
    return new Types\SchemaInternal\InternalQuery($this->client(), $this->load_paths, $this->debug);
  }

  public function customerMutation()
  {
    return new Types\SchemaCustomer\CustomerMutation($this->client(), $this->load_paths, $this->debug);
  }

  public function customerQuery()
  {
    return new Types\SchemaCustomer\CustomerQuery($this->client(), $this->load_paths, $this->debug);
  }

  public function accessToken(): AccessToken
  {
    if (!$this->access_token) {
      throw new Exception('Access token not set, use setAccessToken(AccessToken($client, $secret)) before spawning any schema');
    }
    return $this->access_token->setHttpHeaders($this->http_headers);
  }

  private function client(): GraphqlClient
  {
    if (!$this->client) {
      $this->client = new GraphqlClient($this->accessToken());
    }
    return $this->client->setHttpHeaders($this->http_headers);
  }
}