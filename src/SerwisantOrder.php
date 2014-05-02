<?php 

class SerwisantOrder
{
  private $token;
  
  private $data_fetched = false;
  private $data;
  
  public function setToken($token)
  {
    $this->token = $token;
  }
  
  private function get()
  {
    if ($this->data_fetched) {
      return;
    }
    
    $this->data_fetched = true;
    
    try {
      $client = new SerwisantHttpClient();
      $client->get("/ca/{$this->token}.json");    
      
      $json = $client->getResponse();
      
      if (trim($json) && ($data = json_decode($json))) {
        $this->data = $data;
      }
    }
    catch (Exception $e) {
    
    }
  }
  
  public function found()
  {
    $this->get();
    return $this->data !== null;
  }
  
  public function __get($prop)
  {
    $this->get();
    return $this->data->{$prop};
  }
}
