<?php 

class SerwisantOrder
{
  private $token;
  
  private $data_fetched = false;
  private $data;
  private $errors;
  
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
        if (isset($data->errors)) {
          $this->errors = $data->errors;
        }
        else {
          $this->data = $data;
        }
      }
    }
    catch (Exception $e) {
      $this->errors = array($e->getMessage());
    }
  }
  
  public function found()
  {
    $this->get();
    return $this->data !== null && $this->errors === null;
  }
  
  public function errors()
  {
    return $this->errors;
  }
  
  public function __get($prop)
  {
    $this->get();
    return $this->data->{$prop};
  }
}
