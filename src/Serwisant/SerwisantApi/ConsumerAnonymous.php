<?php

namespace Serwisant\SerwisantApi;

class ConsumerAnonymous extends Consumer
{
  private $client;

  public function __construct($key = '', $secret = '')
  {
    $this->client = new HttpClient();
  }

  protected function getClient()
  {
    return $this->client;
  }

  public function getOrder($code)
  {
    if (trim($code) == '') {
      throw new ConsumerException('Invalid order code');
    }
    return new Order($this->get("/ca/{$code}"));
  }
}
