# Serwisant Online PHP SDK

## Requirements:

* PHP 7.2 or higher
* ext-mbstring
* ext-curl

## Basic usage:

```php
use Serwisant\SerwisantApi;

/* get own client and secret by creating an application via webpage */
$access_token = new SerwisantApi\AccessTokenOauth('client', 'secret', 'public');

$api = new SerwisantApi\Api($client);
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
$repair = $api->preparePublic()->set($query, ['token' => 'abc-def'])->execute()->fetch();
 
echo $repair->displayName;
echo $repair->status->displayName;
```
