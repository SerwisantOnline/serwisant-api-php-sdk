<?php

namespace Serwisant\SerwisantApi;

class AccessTokenContainerSqlite extends AccessTokenContainerPDO
{
  /**
   * @param $db_name
   * @param string $namespace
   * @throws Exception
   */
  public function __construct($db_name = null, $namespace = 'default')
  {
    $tmp_dir = getenv('TMPDIR');
    if (is_null($tmp_dir) || trim($tmp_dir) == '') {
      $tmp_dir = sys_get_temp_dir();
    }

    if (is_null($db_name)) {
      $db_name = $tmp_dir . '/' . md5(__DIR__) . '_' . 'serwisant_api_access_token.sqlite';
    }

    $dir = dirname($db_name);

    if (!is_dir($dir)) {
      throw new Exception("Directory do not exists - please create '{$dir}' directory.");
    }

    if (!is_writable($dir)) {
      throw new Exception("Directory do not writeable - please change permissions of '{$dir}' directory.");
    }

    parent::__construct(["sqlite:" . $db_name], $namespace);

    $this->db()->exec(
      "CREATE TABLE IF NOT EXISTS access_token (namespace TEXT PRIMARY KEY, token TEXT, refresh TEXT, expiry INTEGER) WITHOUT ROWID"
    );
  }
}
