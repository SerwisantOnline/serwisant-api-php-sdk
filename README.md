# Serwisant Online PHP SDK

## Requirements:

* PHP 7.2 or higher
* ext-mbstring
* ext-curl

## Word about versioning

Versioning od SDK is very important. It looks like `3.<major>.<minor>`, eg. `3.0.1`.
When you're including SDK into your composer config, it's strongly recommended to set major version as fixed, eg:
```
"require": {
    "serwisant/serwisant-api": "3.0.*"
},
```  
It's important, because of typed queries and mutations. If schema will change, arguments passed to 
queries and mutations will change as well. It can be new required arguments or even order of arguments can change.
In that case SDK will e released with incremented major version. If you'll decide to upgrade, it can break your application.

**You have being warned.**

There is a single exception to that. `internal` schema is not for public consumption. Breaking changes will be
excluded from above rules.

## Basic usage:

```php
use Serwisant\SerwisantApi;

// get own client and secret by creating an application via webpage
// 4th argument is a access token cache, it's optional, but recommended for performance reasons
$access_token = new SerwisantApi\AccessTokenOauth('client', 'secret', 'public', (new SerwisantApi\AccessTokenContainerFile));

$api = new SerwisantApi\Api();
$api->setAccessToken($access_token);

/* please note __typename at each type - it's required for proper typecast */
$query = 'query($token: String!) {
    repairByToken(token: $token) {
      __typename
      displayName
      status {
        __typename
        displayName
      }
    }
}';

/* @var SerwisantApi\Types\SchemaPublic\Repair $repair */
$repair = $api->publicQuery()->newRequest()->set($query, ['token' => 'abc-def'])->execute()->fetch();
 
echo $repair->displayName;
echo $repair->status->displayName;
```

