<?php

namespace Serwisant\SerwisantApi;

class Api
{
  private $ip;
  private $lang;
  private $load_paths = [];
  private $client;
  private $access_token;

  /**
   * @param $ip
   * @return $this
   */
  public function setIp($ip)
  {
    $this->ip = $ip;
    return $this;
  }

  /**
   * @param $lang
   * @return $this
   */
  public function setLang($lang)
  {
    $this->lang = $lang;
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
    return new Types\SchemaPublic\PublicMutation($this->client(), $this->load_paths);
  }

  public function publicQuery()
  {
    return new Types\SchemaPublic\PublicQuery($this->client(), $this->load_paths);
  }

  public function serviceMutation()
  {
    return new Types\SchemaService\ServiceMutation($this->client(), $this->load_paths);
  }

  public function serviceQuery()
  {
    return new Types\SchemaService\ServiceQuery($this->client(), $this->load_paths);
  }

  public function internalMutation()
  {
    return new Types\SchemaInternal\InternalMutation($this->client(), $this->load_paths);
  }

  public function internalQuery()
  {
    return new Types\SchemaInternal\InternalQuery($this->client(), $this->load_paths);
  }

  public function customerMutation()
  {
    return new Types\SchemaCustomer\CustomerMutation($this->client(), $this->load_paths);
  }

  public function customerQuery()
  {
    return new Types\SchemaCustomer\CustomerQuery($this->client(), $this->load_paths);
  }

  public function accessToken(): AccessToken
  {
    if (!$this->access_token) {
      throw new Exception('Access token not set, use setAccessToken(AccessToken($client, $secret)) before spawning any schema');
    }
    return $this->access_token->setIp($this->ip)->setLang($this->lang);
  }

  private function client(): GraphqlClient
  {
    if (!$this->client) {
      $this->client = new GraphqlClient($this->accessToken());
    }
    return $this->client->setIp($this->ip)->setLang($this->lang);

  }
}