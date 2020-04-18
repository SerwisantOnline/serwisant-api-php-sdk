<?php

namespace Serwisant\SerwisantApi;

abstract class GraphqlRequest
{
  const URL = 'https://serwisant.online/graphql';

  private $client;
  private $url;
  private $load_paths;
  private $query;
  private $variables = [];
  private $results = [];

  public function __construct(Graphql $client, $url = null, $load_paths = [])
  {
    $this->client = $client;
    if ($url) {
      $this->url = $url;
    } else {
      $this->url = GraphqlRequest::URL;
    }
    $this->load_paths = $load_paths;
    $this->load_paths[] = __DIR__ . '/../../../queries';
  }

  abstract protected function schemaPath();

  abstract protected function schemaNamespace();

  /**
   * @return array
   * @throws Exception
   * @throws ExceptionNotFound
   */
  public function introspection()
  {
    $this->setFile('introspectionQuery.graphql')->execute();
    return array_values($this->results)[0];
  }

  /**
   * @param $query
   * @param array $variables
   * @return $this
   */
  public function set($query, $variables = [])
  {
    $this->query = $query;
    $this->variables = $variables;
    return $this;
  }

  /**
   * @param $file
   * @param array $variables
   * @return $this
   * @throws Exception
   */
  public function setFile($file, $variables = [])
  {
    $graphql_file = null;

    $possible_files = array_map(function ($path) use ($file) {
      return "{$path}/{$file}";
    }, $this->load_paths);

    array_unshift($possible_files, $file);

    foreach ($possible_files as $possible_file) {
      if (file_exists($possible_file)) {
        $graphql_file = $possible_file;
        break;
      }
    }

    if (!$graphql_file) {
      throw new Exception("Query file {$file} is missing");
    }

    $query = join(' ', file($graphql_file));

    return $this->set($query, $variables);
  }

  /**
   * @return $this
   * @throws Exception
   * @throws ExceptionNotFound
   */
  public function execute()
  {
    $this->results = $this->client->call("{$this->url}/{$this->schemaPath()}", $this->query, $this->variables);
    return $this;
  }

  /**
   * @param null $id
   * @return mixed
   * @throws Exception
   * @throws Types\Exception
   */
  public function fetch($id = null)
  {
    if (!$id) {
      return Types\Obj::spawn($this->schemaNamespace(), array_values($this->results)[0]);
    } elseif (array_key_exists($id, $this->results)) {
      return Types\Obj::spawn($this->schemaNamespace(), $this->results[$id]);
    }
    throw new Exception("No result for id {$id}");
  }
}