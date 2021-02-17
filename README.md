# Serwisant Online PHP SDK

## Requirements:

* PHP 7.2 or higher
* ext-mbstring
* ext-curl

## Word about versioning

Versioning of SDK is very important. It looks like `3.<major>.<minor>`, eg. `3.0.1`. When you're including SDK into your
composer config, it's strongly recommended to set major version as fixed, eg:

```
"require": {
    "serwisant/serwisant-api": "3.0.*"
},
```  

It's important, because of typed queries and mutations. If schema will change, arguments passed to queries and mutations
will change as well. It can be new required arguments or even order of arguments can change. In that case SDK will e
released with incremented major version. If you'll decide to upgrade, it can break your application.

***YOU HAVE BEING WARNED.***

There is a single exception to that. `internal` schema is not for public consumption. Breaking changes will be excluded
from above rules.

## Usage:

### 1. Access token and schema factory.

First of all, prepare an instance of `SerwisantApi\Api` for later use. It should be shared across whole application. You
can set it as singleton result, put it into a dependency injection container, etc. Don't create more than
one `SerwisantApi\Api` instance - it's useless and ineffective.

```php
use Serwisant\SerwisantApi;

// get own client and secret by creating an application via webpage
$access_token = new SerwisantApi\AccessTokenOauth('client', 'secret', 'public', (new SerwisantApi\AccessTokenContainerFile));

$api = new SerwisantApi\Api();
$api->setAccessToken($access_token);
```

4th argument in `AccessTokenOauth` is an access token cache.

It's optional, but *STRONGLY* recommended for performance reasons, because it's persisting access token between requests
until it expire and avoid create a new token for every HTTP request. Check out other cache containers:

- `SerwisantApi\AccessTokenContainerShm` - in memory container - **not recommended** in production environment on
  multi-process/multi-machine infrastructure
- `SerwisantApi\AccessTokenContainerSqlite` - SQLite database based cache, easy to set-up. Require `PDO`
  and `php_pdo_sqlite` extensions.
- ...build tour own for ie `MySQL`, use `SerwisantApi\AccessTokenContainer` abstract class

***PLEASE NOTE*** - your application can be banned if you'll be creating to many access tokens.

### 2. Basic example with inline query

Put a query string into variable and execute it directly. The most important is to add to each requested object in your
query magic field `__typename`. This gets from GraphQL server a object name and wrap in PHP class. When you'll get a
result it will be a PHP object (or array of objects) having all properties, etc.

Missing magic field for any type will result in exception.

```php
use Serwisant\SerwisantApi;

/* @var SerwisantApi\Api $api */

/* please note __typename at each type - it's required for proper typecast */
$query = '
query($token: String!) {
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

### 3. Prepared queries and mutations

Above example can be called in other way.

Please create in your application's root directory, folder named `queries\SchemaPublic`

Next please put a content of your query string in `queries\SchemaPublic\repairByToken.graphql` file. File name is
important. It must be an exact query name as it's seen in schema. File exnension must be `.graphql`.

This is exactly the same query you've assigned to variable in 1. example.

```php
use Serwisant\SerwisantApi;

/* @var SerwisantApi\Api $api */

// tell SerwisantApi\Api where to look for files with queries, mutations, etc. It can be done once, in 1. example.
$api->addLoadPath('/full/path/to/queries/SchemaPublic');

/* @var SerwisantApi\Types\SchemaPublic\PublicQuery $query */
$query = $api->publicQuery();

/* @var SerwisantApi\Types\SchemaPublic\Repair $repair */
$repair = $query->repairByToken('abc-def'); // abc-def is a token form repair fetched from user input

echo $repair->displayName;
echo $repair->status->displayName;
```

Probably you want to ask: why SDK doesn't provide files with all available queries and mutations?

That's because we have no idea what fields/objects you want to get from schema. Possibility to limit a fetched data is
one of the most important feature of GraphQL. With pre-defined query files you'll lose a possibility to decide by
yourself.

### 4. Batched query

One of cool GraphQL feature is possibility to put into a single request more than one query. You need to give uniq name
for each query, and once it's executed result will contain booth responses.

Use batches for performance reasons. Batching queries reduce HTTP traffic.

```php
use Serwisant\SerwisantApi;

/* @var SerwisantApi\Api $api */

/* please note __typename at each type - it's required for proper typecast */
$query = '
query($token: String!) {
  repair: repairByToken(token: $token) {
    __typename
    displayName
  }
  me: viewer {
    __typename
    employee {
      __typename
      displayName
    }
  } 
}';

$result = $api->publicQuery()->newRequest()->set($query, ['token' => 'abc-def'])->execute();

/* @var SerwisantApi\Types\SchemaPublic\Repair $repair */
$repair = $result->fetch('repair');

/* @var SerwisantApi\Types\SchemaPublic\Viewer $me */
$me = $result->fetch('me');

echo $repair->displayName;
echo $me->subscriber;
```

***PLEASE NOTE*** you can't use a file based query/mutation feature with batched query. Batched queries must be always
performed directly

## Contributions

Pull requests are welcome.

Do not edit or update any files in `src/Serwisant/SerwisantApi/Types` - all files/classes in that directory are
auto-generated and changes will be overwritten.

To generate missing types, queries, mutations use `bin/introspection.php` script:

```
php ./bin/introspection.php 
```

## Release

SDK available as composer package on packagist.org:

- update `composer.json` with new version
- commit and push changes to master
- `git tag 3.0.x`
- `git push origin --tags`

## Licencing

Apache License See LICENCE for full licence information.

## Author

Arkadiusz Kuryłowicz <sms(at)kurylowicz.info>