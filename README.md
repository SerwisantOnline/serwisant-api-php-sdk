# Serwisant Online PHP SDK

## Requirements:

* PHP 7.2 or higher
* ext-json
* ext-curl
* ext-mbstring

optional:

* ext-openssl for `AccessTokenContainerEncryptedFile`
* PDO, sqlite, mysql for `AccessTokenContainerSqlite`/`AccessTokenContainerPDO`

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
$access_token = new SerwisantApi\AccessTokenOauth('client', 'secret', 'public', (new SerwisantApi\AccessTokenContainerEncryptedFile('some_string_as_encryption_key')));

$api = new SerwisantApi\Api();
$api->setAccessToken($access_token);
```

4th argument in `AccessTokenOauth` is an access token cache.

It's optional, but *STRONGLY* recommended for performance reasons, because it's persisting access token between requests
until it expire and avoid create a new token for every HTTP request. Check out other cache containers:

- `SerwisantApi\AccessTokenContainerEncryptedFile` - caches data in encrypted local files, it can be used on
  single-server application with access to local filesystem
- `SerwisantApi\AccessTokenContainerFile` - caches data in plain-text local files, it can be used on single-server
  application with access to local filesystem. ***Please note*** - it's insecure to use it on shared hosting because
  plain access tokens can be saved in `/tmp` directory accessible for other users.
- `SerwisantApi\AccessTokenContainerSession` - in session container, it should be used only
  with `AccessTokenOauthUserCredentials` and store user specific access token (fetched using login and password) -
  please don't use it for only key-secret access tokens.
- `SerwisantApi\AccessTokenContainerSqlite` - SQLite database based cache, easy to set-up. Require `PDO`
  and `php_pdo_sqlite` extensions. When using this container you don't need to worry about database - it will be created
  automatically, on first use.
- `SerwisantApi\AccessTokenContainerPDO` - generic PDO token container. Please note: you must create a database/table
  before first use. Table schema:

```mysql
CREATE TABLE IF NOT EXISTS access_token
(
    namespace varchar(64)  NOT NULL,
    token     varchar(255) NOT NULL,
    refresh   varchar(255),
    expiry    int(11)      NOT NULL,
    PRIMARY KEY (namespace)
);
```   

- ...build your own, use `SerwisantApi\AccessTokenContainer` abstract class

***PLEASE NOTE*** - your application can be banned if you'll be creating to many access tokens, i.e. for every single
request.

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
important. It must be an exact query name as it's seen in schema. File extension must be `.graphql`.

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

***HINT*** Using a GraphQL syntax you can have multiple query variants in single `.graphql` file and select proper one
using query variables. Look on below example. Let's have `repairByToken.graphql`. Put attention on
multiple `repairByToken` and `@include(if: ..)` tag.

```graphql
query repairByToken($token: String!, $basic: Boolean = false, $complete: Boolean = false) {
    repairByToken(token: $token) @include(if: $basic) {
        __typename
        status {
            __typename
            displayName
        }
    }
    repairByToken(token: $token) @include(if: $complete) {
        __typename
        rma
        serial
        vendor
        model
    }
}
```

Call to get only a repair status (query will be executed fast:

```php
$query = $api->publicQuery();
$repair = $query->repairByToken('abc-def', ['basic' => true])
```

Call to get complex information about repair (query execution can take more time):

```php
$query = $api->publicQuery();
$repair = $query->repairByToken('abc-def', ['complete' => true])
```

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

***HINT*** you can put a batched query (let's assume it's above query) into a query folder under a custom name and call
it like:

```php
$result = $api->publicQuery()->newRequest()->setFile('myBatchedQuery.graphql', ['token' => $secret_token])->execute();
$repair = $result->fetch('repair');
$me = $result->fetch('me');
```

## Contributions

Pull requests are welcome.

Do not edit or update any files in `src/Serwisant/SerwisantApi/Types` - all files/classes in that directory are
auto-generated and changes will be overwritten.

To generate missing types, queries, mutations use `bin/introspection.php` script:

```
php ./bin/introspection.php 
```

## Development

SDK available as composer package on packagist.org:

- update `composer.json` with new version
- commit and push changes to master
- `git tag 3.0.x`
- `git push origin --tags`

There are two environment variables to test/develop SDK against development server. Set:

- `OAUTH_URL` to eg. http://127.0.0.1:3000/oauth/token to change OAuth endpoint
- `GRAPHQL_URL` to eg. http://127.0.0.1:3000/graphql to change base address of GraphQL schemas.

## Licencing

Apache License See LICENCE for full licence information.

## Author

Arkadiusz Kuryłowicz <sms(at)kurylowicz.info>