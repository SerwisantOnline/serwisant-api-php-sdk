<?php

namespace Serwisant\SerwisantApi;

class ConsumerAnonymous extends Consumer
{
  private $client;

  public function __construct()
  {
    $this->client = new HttpClient();
  }

  protected function getClient()
  {
    return $this->client;
  }

  protected function getLang()
  {
    return 'pl';
  }

  public function getOrder($code)
  {
    if (trim($code) == '') {
      throw new ConsumerException('Invalid order code');
    }
    return new Order($this->get("/ca/{$code}"));
  }
}
