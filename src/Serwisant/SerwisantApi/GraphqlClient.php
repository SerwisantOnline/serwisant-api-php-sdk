<?php

namespace Serwisant\SerwisantApi;

use GuzzleHttp\Client;

class GraphqlClient
{
  const HOST = 'serwisant.online';

  private $access_token;
  private $client;
  private $http_headers;

  public function __construct(AccessToken $access_token = null)
  {
    $this->access_token = $access_token;
    $this->client = new Client();
  }

  /**
   * @param array $http_headers
   * @return $this
   */
  public function setHttpHeaders(array $http_headers)
  {
    $this->http_headers = $http_headers;
    return $this;
  }

  /**
   * @param $url
   * @param $query
   * @param $variables
   * @return mixed
   * @throws Exception
   * @throws ExceptionAccessDenied
   * @throws ExceptionNotFound
   */
  public function call($url, $query, $variables)
  {
    try {
      $options = $this->clientOptions($url, $query, $variables);
      $res = $this->client->request('POST', $url, $options);
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
    } elseif ($http_code === 429) {
      throw new ExceptionTooManyRequests();
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
      case 410:
        throw new ExceptionSubscriberGone($error_message);
      default:
        throw new Exception("Query or mutation error, message was: " . print_r($errors, true));
    }
  }

  private function clientOptions($url, $query, $variables = null)
  {
    $headers = $this->http_headers;

    if ($this->access_token) {
      $headers['Authorization'] = 'Bearer ' . $this->access_token->get();
    }

    $params = [
      'query' => $this->queryFormat($query),
      'variables' => ($variables !== null ? json_encode($variables) : null),
      'operationName' => null
    ];

    $timeout = intval(getenv('HTTP_TIMEOUT'));
    if ($timeout <= 0) {
      $timeout = 30;
    }

    return [
      'http_errors' => false,
      'connect_timeout' => ceil($timeout / 5),
      'timeout' => $timeout,
      'form_params' => $params,
      'headers' => $headers,
      'verify' => parse_url($url, PHP_URL_HOST) == self::HOST // for custom API URL skip SSL verification
    ];
  }

  private function queryFormat($query)
  {
    return preg_replace('/\s+/', ' ', $query);
  }
}
