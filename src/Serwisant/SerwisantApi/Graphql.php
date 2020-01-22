<?php

namespace Serwisant\SerwisantApi;

class Graphql
{
    const URL = 'https://serwisant-online.pl/graphql';

    private $url;
    private $access_token;
    private $client;
    private $ip;
    private $lang;

    public function __construct(AccessToken $access_token, $url = null)
    {
        if (!$url) {
           $this->url = URL . '/' . $this->schemaPath();
        } else {
          $this->url = $url . '/' . $this->schemaPath();
        }
        $this->access_token = $access_token;
        $this->client = new \GuzzleHttp\Client();
    }

    protected function schemaPath()
    {
      throw new Exception('Schema must define own path');
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

    protected function call_single($root_field, $query, $variables = null)
    {
        $result = $this->call($query, $variables);

        if ($result) {
            $result = $result[$root_field];
        }

        return $result;
    }

    protected function call($query, $variables = null, $is_retry = false)
    {
        $res = $this->client->request('POST', $this->url, $this->client_options($query, $variables));
        $code = $res->getStatusCode();

        if ($code === 200) {
          $result = json_decode($res->getBody()->getContents(), true);
          if (array_key_exists('errors', $result)) {
            return $this->handleErrors($result['errors']);
          } else {
            return $result['data'];
          }
        } elseif ($code === 401 && $is_retry === false) {
          $this->access_token->refresh();
          return $this->call($query, $variables, true);
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

    private function client_options($query, $variables = null)
    {
        $headers = [
            'Authorization' => 'Bearer ' . $this->access_token->get()
        ];

        if (trim((string)$this->ip) !== '') {
            $headers['X-Real-IP'] = $this->ip;
        }
        if (trim((string)$this->lang) !== '') {
            $headers['Accept-Language'] = $this->lang;
        }

        $params = [
            'query' => $this->query_format($query),
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

    private function query_format($query)
    {
        return preg_replace('/\s+/', ' ', $query);
    }
}
