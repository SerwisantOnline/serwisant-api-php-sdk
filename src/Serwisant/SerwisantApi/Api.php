<?php

namespace Serwisant\SerwisantApi;

class Api
{
  private $ip;
  private $lang;
  private $url;
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
   * @param $url
   * @return $this
   */
  public function setUrl($url)
  {
    $this->url = $url;
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
  public function setAccessToken($access_token)
  {
    $this->access_token = $access_token;
    return $this;
  }

  public function publicMutation()
  {
    return new Types\SchemaPublic\PublicMutation($this->client(), $this->url, $this->load_paths);
  }

  public function publicQuery()
  {
    return new Types\SchemaPublic\PublicQuery($this->client(), $this->url, $this->load_paths);
  }

  /**
   * @return AccessToken
   * @throws Exception
   */
  public function accessToken()
  {
    if (!$this->access_token) {
      throw new Exception('Access token not set, use setAccessToken(AccessToken($client, $secret)) before spawning any schema');
    }
    return $this->access_token;
  }

  /**
   * @return GraphqlClient
   * @throws Exception
   */
  private function client()
  {
    if (!$this->client) {
      $this->client = new GraphqlClient($this->accessToken());
    }
    $this->client->setIp($this->ip)->setLang($this->lang);
    return $this->client;
  }
}