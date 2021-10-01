<?php

namespace Serwisant\SerwisantApi;

use Symfony\Component\HttpFoundation\Request;

class Api
{
  private $ip;
  private $lang;
  private $load_paths = [];
  private $client;
  private $access_token;

  /**
   * @param Request $request
   * @return $this
   */
  public function setUpFromRequest(Request $request)
  {
    if ($request->headers->has('CF-Connecting-IP')) {
      $client_ip = $request->headers->get('CF-Connecting-IP');
    } else {
      $client_ip = $request->getClientIp();
    }
    $this->setIp($client_ip);

    if ($request->headers->has('Accept-Language')) {
      $lang = $request->headers->get('Accept-Language');
    } else {
      $lang = 'pl-PL';
    }
    $this->setLang($lang);
    return $this;
  }

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

  /**
   * @return AccessToken
   * @throws Exception
   */
  public function accessToken()
  {
    if (!$this->access_token) {
      throw new Exception('Access token not set, use setAccessToken(AccessToken($client, $secret)) before spawning any schema');
    }
    $this->access_token->setIp($this->ip);
    $this->access_token->setLang($this->lang);
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
    $this->client->setIp($this->ip);
    $this->client->setLang($this->lang);
    return $this->client;
  }
}