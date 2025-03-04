#!/bin/bash

rm -rf ../src/Serwisant/SerwisantApi/Types/SchemaCustomer
rm -rf ../src/Serwisant/SerwisantApi/Types/SchemaInternal
rm -rf ../src/Serwisant/SerwisantApi/Types/SchemaPublic
rm -rf ../src/Serwisant/SerwisantApi/Types/SchemaService

export SERWISANT_HOST="http://127.0.0.1:3000"
php introspection.php