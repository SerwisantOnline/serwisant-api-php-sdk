#!/bin/bash

rm -rf ../src/Serwisant/SerwisantApi/Types/SchemaCustomer
rm -rf ../src/Serwisant/SerwisantApi/Types/SchemaInternal
rm -rf ../src/Serwisant/SerwisantApi/Types/SchemaPublic
rm -rf ../src/Serwisant/SerwisantApi/Types/SchemaService

export GRAPHQL_URL="http://127.0.0.1:3000/graphql"
php introspection.php