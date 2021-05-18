<?php

namespace Serwisant\SerwisantApi;

class AccessTokenContainerFile implements AccessTokenContainer
{
  protected $file_path;
  protected $data;

  public function __construct($dir = null, $namespace = 'default')
  {
    if (is_null($dir)) {
      $dir = sys_get_temp_dir();
    }

    if (!is_dir($dir)) {
      throw new Exception("Directory do not exists - please create '{$dir}' directory.");
    }

    if (!is_writable($dir)) {
      throw new Exception("Directory do not writeable - please change permissions of '{$dir}' directory.");
    }

    $this->file_path = $dir . '/' . md5(__DIR__) . '_' . $namespace . '_access_token.json';
    $this->data = null;
  }

  public function store($access_token, $expiry_timestamp, $refresh_token = null)
  {
    $payload = json_encode([
      'access_token' => $access_token,
      'expiry_timestamp' => $expiry_timestamp,
      'refresh_token' => $refresh_token
    ]);
    $this->writeFile($payload);
    $this->data = null;
  }

  public function getAccessToken()
  {
    return $this->data()['access_token'];
  }

  public function getExpiryTimestamp()
  {
    return (int)$this->data()['expiry_timestamp'];
  }

  public function getRefreshToken()
  {
    return $this->data()['refresh_token'];
  }

  private function data()
  {
    if (!is_array($this->data)) {
      if (file_exists($this->file_path) && mb_strlen($content = $this->readFile()) > 0) {
        $this->data = json_decode($content, true);
      } else {
        $this->data = [
          'access_token' => null,
          'expiry_timestamp' => 0,
          'refresh_token' => null
        ];
      }
    }
    return $this->data;
  }

  protected function readFile()
  {
    return file_get_contents($this->file_path);
  }

  protected function writeFile($content)
  {
    file_put_contents($this->file_path, $content);
    return true;
  }
}
