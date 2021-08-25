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
   * @return mixed
   * @throws Exception
   * @throws ExceptionAccessDenied
   * @throws ExceptionNotFound
   */
  public function call($url, $query, $variables, array $options = [])
  {
    try {
      $res = $this->client->request('POST', $url, $this->clientOptions($query, $variables));
    } catch (\GuzzleHttp\Exception\GuzzleException $e) {
      throw new Exception($e->getMessage());
    }

    $http_code = $res->getStatusCode();

    if ($http_code === 200) {
      $result = json_decode($res->getBody()->getContents(), true);
      if (array_key_exists('errors', $result)) {
        $this->handleErrors($result['errors']);
      }
      return $result['data'];
    } else {
      throw new Exception("Unable to execute a query or mutation, HTTP code was '{$http_code}', response was: '{$res->getBody()->getContents()}'");
    }
  }

  /**
   * @param array $errors
   * @throws Exception
   * @throws ExceptionAccessDenied
   * @throws ExceptionNotFound
   */
  private function handleErrors(array $errors)
  {
    if ($errors[0] && array_key_exists('extensions', $errors[0]) && array_key_exists('code', $errors[0]['extensions'])) {
      $error_code = (int)$errors[0]['extensions']['code'];
      $error_message = $errors[0]['message'];
    } elseif ($errors[0] && array_key_exists('error', $errors[0]) && $errors[0]['error'] == 'unauthorized_client') {
      $error_code = 403;
      $error_message = $errors[0]['error_description'];
    } else {
      $error_code = null;
      $error_message = null;
    }

    switch ($error_code) {
      case 403:
        throw new ExceptionAccessDenied($error_message, "{$error_code}");
      case 404:
        throw new ExceptionNotFound($error_message);
      default:
        throw new Exception("Query or mutation error, message was: " . print_r($errors, true));
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
