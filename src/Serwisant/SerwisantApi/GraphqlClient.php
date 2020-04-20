<?php

namespace Serwisant\SerwisantApi;

use GuzzleHttp\Client;

class GraphqlClient
{
  private $url;
  private $access_token;
  private $client;
  private $ip;
  private $lang;

  public function __construct(AccessToken $access_token = null)
  {
    $this->access_token = $access_token;
    $this->client = new Client();
  }

  public function setIp($ip)
  {
    $this->ip = $ip;
    return $this;
  }

  public function setLang($lang)
  {
    $this->lang = $lang;
    return $this;
  }

  /**
   * @param $url
   * @param $query
   * @param $variables
   * @param array $options
   * @param bool $is_retry
   * @return array
   * @throws Exception
   * @throws ExceptionNotFound
   */
  public function call($url, $query, $variables, array $options = [], $is_retry = false)
  {
    $res = $this->client->request('POST', $url, $this->clientOptions($query, $variables));
    $code = $res->getStatusCode();

    if ($code === 200) {
      $result = json_decode($res->getBody()->getContents(), true);
      if (array_key_exists('errors', $result)) {
        $this->handleErrors($result['errors']);
      } else {
        return $result['data'];
      }
    } elseif ($code === 401 && $is_retry === false) {
      $this->access_token->refresh();
      return $this->call($url, $query, $variables, $options, true);
    } else {
      throw new Exception("Unable to execute a query or mutation, HTTP code was '{$code}'");
    }
  }

  private function handleErrors(array $errors)
  {
    if ($errors[0] && array_key_exists('extensions', $errors[0]) && array_key_exists('code', $errors[0]['extensions'])) {
      $error_code = $errors[0]['extensions']['code'];
      $error_message = $errors[0]['message'];
    } else {
      $error_code = null;
      $error_message = null;
    }

    switch ($error_code) {
      case '404':
        throw new ExceptionNotFound($error_message);
      default:
        throw new Exception("Query or mutation syntax error, message was: " . print_r($errors, true));
    }
  }

  private function clientOptions($query, $variables = null)
  {
    $headers = [];

    if ($this->access_token) {
      $headers['Authorization'] = 'Bearer ' . $this->access_token->get();
    }

    if (trim((string)$this->ip) !== '') {
      $headers['X-Real-IP'] = $this->ip;
    }
    if (trim((string)$this->lang) !== '') {
      $headers['Accept-Language'] = $this->lang;
    }

    $params = [
      'query' => $this->queryFormat($query),
      'variables' => ($variables !== null ? json_encode($variables) : null),
      'operationName' => null
    ];

    return [
      'http_errors' => false,
      'connect_timeout' => 5,
      'timeout' => 30,
      'form_params' => $params,
      'headers' => $headers
    ];
  }

  private function queryFormat($query)
  {
    return preg_replace('/\s+/', ' ', $query);
  }
}
