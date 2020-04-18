<?php

namespace Serwisant\SerwisantApi;

class AccessTokenContainerShm implements AccessTokenContainer
{
  private $shm_key;
  private $access_token;
  private $expiry_timestamp;

  public function __construct()
  {
    $this->shm_key = $this->ftok(__FILE__);
  }

  public function store($access_token, $expiry_timestamp)
  {
    $shm_data = ($access_token . '-' . $expiry_timestamp);

    $shm_id = @shmop_open($this->shm_key, "c", 0644, strlen($shm_data));

    if ($shm_id) {
      shmop_write($shm_id, $shm_data, 0);
      shmop_close($shm_id);
    }
  }

  public function getAccessToken()
  {
    if ($this->access_token === null) {
      $this->fetchShm();
    }
    return $this->access_token;
  }

  public function getExpiryTimestamp()
  {
    if ($this->expiry_timestamp === null) {
      $this->fetchShm();
    }
    return (int)$this->expiry_timestamp;
  }

  private function fetchShm()
  {
    $shm_id = @shmop_open($this->shm_key, 'a', 0, 0);

    if ($shm_id) {
      if (($shm_size = shmop_size($shm_id)) > 0) {
        $shm_data = shmop_read($shm_id, 0, $shm_size);
        $parts = explode('-', $shm_data);
        $this->access_token = $parts[0];
        $this->expiry_timestamp = $parts[1];
      }
      shmop_close($shm_id);
    }
  }

  private function ftok($filename)
  {
    if (!function_exists('ftok')) {
      if (empty($filename) || !file_exists($filename)) {
        return -1;
      } else {
        $filename = $filename . (string)'b';
        for ($key = array(); sizeof($key) < strlen($filename); $key[] = ord(substr($filename, sizeof($key), 1))) ;
        return dechex(array_sum($key));
      }
    } else {
      return ftok($filename, 'b');
    }
  }
}
