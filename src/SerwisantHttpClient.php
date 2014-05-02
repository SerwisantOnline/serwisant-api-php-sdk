<?php

class SerwisantHttpClientException extends Exception
{

}

class SerwisantHttpClient
{
  const BASE_URL = 'http://serwisant-online.pl';

  const UA = 'serwisant-php-sdk';
  const VERSION = '1.0';
  
  const HTTP_GET =  'GET';
  const HTTP_POST =  'POST';

  private $curl;
  private $response;
  private $response_code = 0;

  private function initCurl()
  {
    if (null === $this->curl) {
      $this->curl = curl_init();
      curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($this->curl, CURLINFO_HEADER_OUT, true);
      curl_setopt($this->curl, CURLOPT_FAILONERROR, false);
      curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 5);
      curl_setopt($this->curl, CURLOPT_TIMEOUT, 5);
      curl_setopt($this->curl, CURLOPT_USERAGENT, sprintf("%s: %s", self::UA, self::VERSION));
    }
  }

  public function get($path, array $params = array())
  {
    $url = self::BASE_URL . $path . (count($params) > 0 ? http_build_query($params) : '');
    $this->exec($url, array(), self::HTTP_GET);
    return $this;
  }

  /**
   *
   * @throws SerwisantHttpClientException
   * @param $url
   * @param array $headers
   *
   * @return SerwisantHttpClientException
   */
  private function exec($url, array $headers, $method = self::HTTP_GET, $postfields = null)
  {
    $this->response = null;
    $this->response_code = 0;

    $this->initCurl();

    curl_setopt($this->curl, CURLOPT_URL, $url);
    curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);
    if (self::HTTP_POST == $method && null !== $postfields) {
      curl_setopt($this->curl, CURLOPT_POSTFIELDS, $postfields);
    }
    curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);

    $this->response = curl_exec($this->curl);
    if ($errno = curl_errno($this->curl)) {
      throw new SerwisantHttpClientException(curl_error($this->curl), $errno);
    }

    $this->response_code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
    return $this;
  }

  /**
   *
   * @return string
   */
  public function getResponse()
  {
    return $this->response;
  }

  /**
   *
   * @return int
   */
  public function getResponseCode()
  {
    return $this->response_code;
  }
  
  public function __destruct()
  {
    if (null !== $this->curl) {
      curl_close($this->curl);
    }
  }
}
