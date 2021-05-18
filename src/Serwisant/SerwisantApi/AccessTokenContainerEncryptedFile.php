<?php


namespace Serwisant\SerwisantApi;


class AccessTokenContainerEncryptedFile extends AccessTokenContainerFile
{
  const CIPHER = 'aes-128-cbc';
  private $key;

  /***
   * AccessTokenContainerEncryptedFile constructor.
   * @param $key
   * @param null $dir
   * @param string $namespace
   * @throws Exception
   */
  public function __construct($key, $dir = null, $namespace = 'default')
  {
    parent::__construct($dir, $namespace);

    if (false === extension_loaded('openssl')) {
      throw new Exception('openssl extension is missing, you can\'t use this container.');
    }
    if (false === in_array(self::CIPHER, openssl_get_cipher_methods())) {
      throw new Exception(self::CIPHER . ' is not supported');
    }
    if (strlen($key) < 5) {
      throw new Exception("Encryption key is too short, it must have at least 10 characters.");
    }

    $this->key = $key;
    $this->file_path = $this->file_path . '.enc';
  }

  protected function readFile()
  {
    $key = openssl_digest($this->key, 'SHA256', true);

    $ciphertext = base64_decode(file_get_contents($this->file_path));

    $iv_len = openssl_cipher_iv_length(self::CIPHER);
    $iv = substr($ciphertext, 0, $iv_len);
    $hmac = substr($ciphertext, $iv_len, $sha2len = 32);
    $ciphertext_raw = substr($ciphertext, $iv_len + $sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, self::CIPHER, $key, OPENSSL_RAW_DATA, $iv);
    $calc_hmac = hash_hmac('sha256', $ciphertext_raw, $key, true);

    if (hash_equals($hmac, $calc_hmac)) {
      return $original_plaintext;
    } else {
      return '';
    }
  }

  protected function writeFile($content)
  {
    $key = openssl_digest($this->key, 'SHA256', true);

    $iv_len = openssl_cipher_iv_length(self::CIPHER);
    $iv = openssl_random_pseudo_bytes($iv_len);
    $ciphertext_raw = openssl_encrypt($content, self::CIPHER, $key, OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, true);
    $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);

    file_put_contents($this->file_path, $ciphertext);
    return true;
  }
}