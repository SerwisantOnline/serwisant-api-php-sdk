<?php

namespace Serwisant\SerwisantApi;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;

class GraphqlClient
{
  const HOST = 'serwisant.online';

  private $access_token;
  private $client;
  private $http_headers;

  /**
   * @param AccessToken|null $access_token
   * @param ClientInterface|null $http_client custom Guzzle client, eg. with a mock handler in tests; default is a plain Client
   */
  public function __construct(?AccessToken $access_token = null, ?ClientInterface $http_client = null)
  {
    $this->access_token = $access_token;
    $this->client = $http_client ?? new Client();
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
   * Executes a query or mutation. When the API rejects the access token (HTTP 401 or GraphQL error code 401), the token
   * is refreshed with AccessToken::refresh() and the request is retried once; a token rejected again results
   * in ExceptionAccessDenied with handle 'invalid_token'.
   *
   * @param $url
   * @param $query
   * @param $variables
   * @return mixed
   * @throws Exception
   * @throws ExceptionAccessDenied
   * @throws ExceptionNotFound
   * @throws ExceptionUnauthorized refreshing a rejected user token failed (eg. refresh token no longer valid)
   * @throws ExceptionUserCredentialsRequired a rejected user token cannot be refreshed, the user must log in again
   */
  public function call($url, $query, $variables)
  {
    try {
      return $this->execute($url, $query, $variables);
    } catch (ExceptionTokenRejected $e) {
      if (!$this->access_token) {
        throw new ExceptionAccessDenied($e->getMessage(), 'invalid_token');
      }
    }

    $this->access_token->refresh();

    try {
      return $this->execute($url, $query, $variables);
    } catch (ExceptionTokenRejected $e) {
      throw new ExceptionAccessDenied($e->getMessage(), 'invalid_token');
    }
  }

  /**
   * @throws Exception
   * @throws ExceptionTokenRejected
   */
  private function execute($url, $query, $variables)
  {
    try {
      $options = $this->clientOptions($url, $query, $variables);
      $res = $this->client->request('POST', $url, $options);
    } catch (GuzzleException $e) {
      throw new Exception($e->getMessage());
    }

    $http_code = $res->getStatusCode();

    if ($http_code === 200) {
      $result = json_decode($res->getBody()->getContents(), true);
      if (array_key_exists('errors', $result)) {
        $this->handleErrors($result['errors']);
      }
      return $result['data'];
    } elseif ($http_code === 401) {
      throw new ExceptionTokenRejected("Access token was rejected by the API, HTTP code was '401'");
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
   * @throws ExceptionTokenRejected
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
      case 401:
        throw new ExceptionTokenRejected("Access token was rejected by the API: {$error_message}");
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
      'connect_timeout' => $timeout,
      'timeout' => $timeout,
      'force_ip_resolve' => 'v4',
      'http_errors' => false,
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
