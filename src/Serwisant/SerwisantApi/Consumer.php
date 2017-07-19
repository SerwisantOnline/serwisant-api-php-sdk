<?php

namespace Serwisant\SerwisantApi;

abstract class Consumer
{
  abstract protected function getClient();

  abstract protected function getLang();

  public function get($path, $params = [])
  {
    $params['lang'] = $this->getLang();

    $client = $this->getClient();

    $client->get("{$path}.json", $params);
    $code = $client->getResponseCode();

    if ($code === 404) {
      throw new NotFoundException('Not found');
    } elseif ($code === 401) {
      throw new ConsumerException('Not authorised, check credentials');
    } elseif ($code !== 200) {
      throw new ConsumerException('Response code was: ' . $code);
    }

    $json = $client->getResponse();

    if (trim($json) == '') {
      throw new ConsumerException('Empty response');
    }

    $data = json_decode($json, true);
    $json_error = json_last_error();

    if (is_null($data) || $json_error !== JSON_ERROR_NONE) {
      throw new ConsumerException("JSON parse error: {$json_error}, data was: " . print_r($data, 1) );
    }

    if (isset($data['errors'])) {
      throw new ConsumerException('Got endpoint error: ' . $data['errors']);
    }

    return $data;
  }
}
