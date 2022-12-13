<?php

namespace Serwisant\SerwisantApi;

class GraphqlRequest
{
  const URL = 'https://serwisant.online/graphql';

  private $client;
  private $schema_path;
  private $schema_namespace;
  private $load_paths;
  private $debug = 0;
  private $query;
  private $variables = [];
  private $results = [];

  public function __construct(GraphqlClient $client, $schema_path, $schema_namespace, array $load_paths = [], int $debug = 0)
  {
    $this->client = $client;
    $this->schema_path = $schema_path;
    $this->schema_namespace = $schema_namespace;
    $this->load_paths = $load_paths;
    $this->load_paths[] = __DIR__ . '/../../../queries';
    $this->load_paths[] = __DIR__ . "/../../../queries/{$schema_namespace}";
    $this->debug = $debug;
  }

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
      return realpath($path) . "/{$file}";
    }, $this->load_paths);

    array_unshift($possible_files, $file);

    foreach ($possible_files as $possible_file) {
      if (file_exists($possible_file)) {
        $graphql_file = $possible_file;
        break;
      }
    }

    if (!$graphql_file) {
      throw new Exception("GraphQL file {$file} is missing, searched files: " . join(', ', $possible_files));
    }

    $query = join(' ', file($graphql_file));

    return $this->set($query, $variables);
  }

  /**
   * @return $this
   * @throws Exception
   * @throws ExceptionAccessDenied
   * @throws ExceptionNotFound
   */
  public function execute()
  {
    $url = "{$this->url()}/{$this->schema_path}";

    if ($this->debug == 1) {
      error_log("GraphQL request: $url");
    } elseif ($this->debug == 2) {
      error_log("GraphQL request: $url - $this->query");
    }

    $this->results = $this->client->call($url, $this->query, $this->variables);
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
    if (count($this->results) == 0) {
      throw new Exception("Received empty result, double check is your query or mutation defines any fields to select");
    }
    if (!$id) {
      $id = array_keys($this->results)[0];
    }
    if (array_key_exists($id, $this->results)) {
      return Types\Type::spawn($this->schema_namespace, $this->results[$id], $id);
    }
    throw new Exception("No result for id {$id}");
  }

  protected function url()
  {
    if (trim(getenv('GRAPHQL_URL'))) {
      return getenv('GRAPHQL_URL');
    } else {
      return self::URL;
    }
  }
}