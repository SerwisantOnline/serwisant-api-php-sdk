<?php

namespace Serwisant\SerwisantApi;

class HttpClient
{
  const BASE_URL = 'https://serwisant-online.pl';

  const UA = 'serwisant-php-sdk';

  const HTTP_GET =  'GET';
  const HTTP_POST =  'POST';

  private $curl;

  private $response;
  private $response_code = 0;

  private $oauth_consumer;

  public function __construct($key = null, $secret = null, $strict_ssl = true)
  {
    if ($key && $secret) {
      $this->oauth_consumer = new \OAuthConsumer($key, $secret);
    }

    $this->curl = curl_init();

    curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($this->curl, CURLINFO_HEADER_OUT, true);
    curl_setopt($this->curl, CURLOPT_FAILONERROR, false);
    curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($this->curl, CURLOPT_TIMEOUT, 5);
    curl_setopt($this->curl, CURLOPT_USERAGENT, sprintf("%s: %s", self::UA, Version::VERSION));

    if (!$strict_ssl) {
      curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
    }
  }

  public function get($path, array $params = array())
  {
    $url = self::BASE_URL . $path . (count($params) > 0 ? ('?' . http_build_query($params)) : '');
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
  private function exec($url, array $headers = array(), $method = self::HTTP_GET, $postfields = null)
  {
    $this->response = null;
    $this->response_code = 0;

    if ($this->oauth_consumer) {
      $request = \OAuthRequest::from_consumer_and_token($this->oauth_consumer, null, $method, $url, $postfields);
      $request->sign_request(new \OAuthSignatureMethod_HMAC_SHA1(), $this->oauth_consumer, null);
      $headers = array_merge($headers, array($request->to_header()));
    }

    curl_setopt($this->curl, CURLOPT_URL, $url);
    curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);

    if (self::HTTP_POST == $method && null !== $postfields) {
      curl_setopt($this->curl, CURLOPT_POSTFIELDS, $postfields);
    }

    curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);

    $this->response = curl_exec($this->curl);

    if ($errno = curl_errno($this->curl)) {
      throw new HttpClientException(curl_error($this->curl), $errno);
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
