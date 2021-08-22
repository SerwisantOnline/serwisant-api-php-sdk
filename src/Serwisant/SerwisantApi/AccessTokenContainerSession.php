<?php


namespace Serwisant\SerwisantApi;

class AccessTokenContainerSession implements AccessTokenContainer
{


  private $namespace;
  private $data;

  public function __construct($namespace = "serwisant_api_user_access_token")
  {
    if (strlen(trim($namespace)) < 6 || strlen(trim($namespace)) > 64) {
      throw new Exception("Namespace string length must be between 10 and 64 chars");
    }

    $this->namespace = $namespace;
    $this->data = null;
  }

  public function store($access_token, $expiry_timestamp, $refresh_token = null)
  {
    $this->checkSessionStarted();

    $payload = json_encode([
      'access_token' => $access_token,
      'expiry_timestamp' => $expiry_timestamp,
      'refresh_token' => $refresh_token
    ]);
    $_SESSION[$this->sessionKey()] = $payload;

    $this->data = null;
  }

  public function getAccessToken()
  {
    return $this->data()['access_token'];
  }

  public function getRefreshToken()
  {
    return $this->data()['refresh_token'];
  }

  public function getExpiryTimestamp()
  {
    return (int)$this->data()['expiry_timestamp'];
  }

  private function sessionKey()
  {
    return $this->namespace;
  }
  
  private function checkSessionStarted()
  {
    if (session_status() !== PHP_SESSION_ACTIVE) {
      throw new Exception("PHP session not started, call session_start() before storing or restoring a token");
    }
  }

  private function data()
  {
    $this->checkSessionStarted();

    if (!is_array($this->data)) {
      if (array_key_exists($this->sessionKey(), $_SESSION)) {
        $this->data = json_decode($_SESSION[$this->sessionKey()], true);
      } else {
        $this->data = [
          'access_token' => null,
          'expiry_timestamp' => null,
          'refresh_token' => null
        ];
      }
    }

    return $this->data;
  }
}