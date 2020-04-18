<?php
namespace Serwisant\SerwisantApi;

class SchemaService extends GraphqlRequest
{
  protected function schemaPath()
  {
    return 'service';
  }

  protected function schemaNamespace()
  {
    return 'SchemaService';
  }
}