<?php

namespace Serwisant\SerwisantApi;

class AccessTokenContainerFile implements AccessTokenContainer
{
  private $file_path;
  private $access_token;
  private $expiry_timestamp;

  public function __construct($dir = '/tmp')
  {
    if (!is_dir($dir)) {
      throw new Exception("Directory do not exists - please create '{$dir}' directory.");
    }
    if (!is_writable($dir)) {
      throw new Exception("Directory do not writeable - please change permissions of '{$dir}' directory.");
    }
    $this->file_path = $dir . '/' . md5(__FILE__) . '_access_token.json';
  }

  public function store($access_token, $expiry_timestamp)
  {
    $payload = json_encode(['access_token' => $access_token, 'expiry_timestamp' => $expiry_timestamp]);
    file_put_contents($this->file_path, $payload);
  }

  public function getAccessToken()
  {
    if ($this->access_token === null) {
      $this->fetch();
    }
    return $this->access_token;
  }

  public function getExpiryTimestamp()
  {
    if ($this->expiry_timestamp === null) {
      $this->fetch();
    }
    return (int)$this->expiry_timestamp;
  }

  private function fetch()
  {
    if (file_exists($this->file_path)) {
      $content = file_get_contents($this->file_path);
      $payload = json_decode($content, true);
      $this->access_token = $payload['access_token'];
      $this->expiry_timestamp = $payload['expiry_timestamp'];
    } else {
      $this->access_token = null;
      $this->expiry_timestamp = null;
    }
  }
}
