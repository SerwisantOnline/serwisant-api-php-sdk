<?php

namespace Serwisant\SerwisantApi;

use PDO;

class AccessTokenContainerSqlite implements AccessTokenContainer
{
  private $db;
  private $loaded;
  private $namespace;
  private $access_token;
  private $expiry_timestamp;
  private $refresh_token;

  /**
   * @param $db_name
   * @param string $namespace
   * @throws Exception
   */
  public function __construct($db_name = null, $namespace = 'default')
  {
    if (is_null($db_name)) {
      $db_name = sys_get_temp_dir() . '/' . md5(__DIR__) . '_' . 'access_token.sqlite';
    }

    $dir = dirname($db_name);

    if (!is_dir($dir)) {
      throw new Exception("Directory do not exists - please create '{$dir}' directory.");
    }

    if (!is_writable($dir)) {
      throw new Exception("Directory do not writeable - please change permissions of '{$dir}' directory.");
    }

    $this->namespace = $namespace;

    $this->db = new PDO("sqlite:" . $db_name);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->exec("CREATE TABLE IF NOT EXISTS access_token (namespace TEXT PRIMARY KEY, token TEXT, refresh TEXT, expiry INTEGER) WITHOUT ROWID");

    $this->loaded = false;
  }

  public function store($access_token, $expiry_timestamp, $refresh_token = null)
  {
    $stmt = $this->db->prepare("DELETE FROM access_token WHERE namespace = :namespace");
    $stmt->bindParam(':namespace', $this->namespace);
    $stmt->execute();

    $stmt = $this->db->prepare("INSERT INTO access_token (namespace, token, refresh, expiry) VALUES (:namespace, :token, :refresh, :expiry)");
    $stmt->bindParam(':namespace', $this->namespace);
    $stmt->bindParam(':token', $access_token);
    $stmt->bindParam(':expiry', $expiry_timestamp);
    $stmt->bindParam(':refresh', $refresh_token);
    $stmt->execute();

    $this->loaded = false;
  }

  public function getAccessToken()
  {
    if (!$this->loaded) {
      $this->fetchSqlite();
    }
    return $this->access_token;
  }

  public function getExpiryTimestamp()
  {
    if (!$this->loaded) {
      $this->fetchSqlite();
    }
    return (int)$this->expiry_timestamp;
  }

  public function getRefreshToken()
  {
    if (!$this->loaded) {
      $this->fetchSqlite();
    }
    return $this->refresh_token;
  }

  private function fetchSqlite()
  {
    $stmt = $this->db->prepare('SELECT token, refresh, expiry FROM access_token WHERE namespace = :namespace LIMIT 1');
    $stmt->bindParam(':namespace', $this->namespace);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
      $this->access_token = $row['token'];
      $this->expiry_timestamp = (int)$row['expiry'];
      $this->refresh_token = $row['refresh'];
    } else {
      $this->access_token = null;
      $this->expiry_timestamp = 0;
      $this->refresh_token = null;
    }

    $this->loaded = true;
  }
}
