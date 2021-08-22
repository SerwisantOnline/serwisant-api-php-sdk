<?php

namespace Serwisant\SerwisantApi;

use PDO;

class AccessTokenContainerPDO implements AccessTokenContainer
{
  private $namespace;
  private $connection_string;

  private $db;

  private $loaded;
  private $access_token;
  private $expiry_timestamp;
  private $refresh_token;

  public function __construct($connection_string = null, $namespace = 'default')
  {
    if (strlen(trim($connection_string)) < 5) {
      throw new Exception("Connection string looks invalid");
    }
    if (strlen($namespace) > 64) {
      throw new Exception("Namespace strinh length must me under 64 chars");
    }
    $this->namespace = $namespace;
    $this->connection_string = $connection_string;
    $this->loaded = false;
  }

  protected function db()
  {
    if ($this->db) {
      $this->db = new PDO($this->connection_string);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $this->db;
  }

  public function store($access_token, $expiry_timestamp, $refresh_token = null)
  {
    $stmt = $this->db()->prepare("DELETE FROM access_token WHERE namespace = :namespace");
    $stmt->bindParam(':namespace', $this->namespace);
    $stmt->execute();

    $stmt = $this->db()->prepare("INSERT INTO access_token (namespace, token, refresh, expiry) VALUES (:namespace, :token, :refresh, :expiry)");
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
    $stmt = $this->db()->prepare('SELECT token, refresh, expiry FROM access_token WHERE namespace = :namespace');
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