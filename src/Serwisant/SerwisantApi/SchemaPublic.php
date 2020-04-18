<?php

namespace Serwisant\SerwisantApi;

class SchemaPublic extends GraphqlRequest
{
  protected function schemaPath()
  {
    return 'public';
  }

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}