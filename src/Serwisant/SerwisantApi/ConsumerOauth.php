<?php

namespace Serwisant\SerwisantApi;

class ConsumerOauth extends Consumer
{
  private $key;
  private $secret;
  private $client;

  public function __construct($key = '', $secret = '')
  {
    if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i", $key)) {
      throw new ConsumerException('Invalid OAuth key - to get proper one go to https://serwisant-online.pl/oauth_credentials and create it');
    }
    if (strlen($secret) < 32) {
      throw new ConsumerException('Invalid OAuth secret - to get proper one go to https://serwisant-online.pl/oauth_credentials and create it');
    }
    $this->client = new HttpClient($key, $secret);
  }

  protected function getClient()
  {
    return $this->client;
  }

  public function getOrder($id)
  {
    if (false === is_numeric($id)) {
      throw new ConsumerException('Order id must be a number');
    }
    return new Order($this->get("/orders/{$id}"));
  }
}
