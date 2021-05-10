#!/bin/bash

rm -rf ../src/Serwisant/SerwisantApi/Types/SchemaCustomer
rm -rf ../src/Serwisant/SerwisantApi/Types/SchemaInternal
rm -rf ../src/Serwisant/SerwisantApi/Types/SchemaPublic
rm -rf ../src/Serwisant/SerwisantApi/Types/SchemaService

php introspection.php dev