# Serwisant Online API PHP SDK

PHP client for the [Serwisant Online](https://serwisant.online) GraphQL API. It handles OAuth access tokens (including
caching and refreshing), executes queries and mutations, and casts results into typed PHP classes generated from the
API schema.

## Requirements

* PHP 7.2 or higher
* `ext-json`
* `ext-curl`
* `ext-mbstring`
* `guzzlehttp/guzzle` 6.5 or 7.x (installed automatically by Composer)

Optional:

* `ext-openssl` for `AccessTokenContainerEncryptedFile`
* `ext-pdo` with the `sqlite` or `mysql` driver for `AccessTokenContainerSqlite` / `AccessTokenContainerPDO`

## Installation

```
composer require serwisant/serwisant-api "3.5.*"
```

## A word about versioning

Versioning of the SDK is very important. The version number looks like `3.<major>.<minor>`, e.g. `3.4.0`. When you
include the SDK in your Composer config, it is strongly recommended to pin the major version, e.g.:

```json
"require": {
    "serwisant/serwisant-api": "3.4.*"
}
```

This matters because queries and mutations are typed. If the schema changes, the arguments passed to queries and
mutations change as well: newly introduced method arguments may be mandatory, or the order of arguments may change. In
that case the SDK is released with an incremented major version. If you decide to upgrade, it can break your
application.

Breaking changes are described in the [CHANGELOG](/CHANGELOG.md).

***YOU HAVE BEEN WARNED.***

There is a single exception to this rule: the `internal` schema is not intended for public consumption, and breaking
changes in it are excluded from the rules above.

## Available schemas

The API exposes several GraphQL schemas. Each has its own root query and mutation class, accessible from
`SerwisantApi\Api`:

| Schema     | Query                   | Mutation                   | Generated types namespace                     |
|------------|-------------------------|----------------------------|-----------------------------------------------|
| `public`   | `$api->publicQuery()`   | `$api->publicMutation()`   | `SerwisantApi\Types\SchemaPublic`             |
| `customer` | `$api->customerQuery()` | `$api->customerMutation()` | `SerwisantApi\Types\SchemaCustomer`           |
| `service`  | `$api->serviceQuery()`  | `$api->serviceMutation()`  | `SerwisantApi\Types\SchemaService`            |
| `internal` | `$api->internalQuery()` | `$api->internalMutation()` | `SerwisantApi\Types\SchemaInternal` (not public) |

Each root class contains one method per query or mutation defined in the schema, with a PHPDoc comment describing
arguments and the returned type. Browse `src/Serwisant/SerwisantApi/Types/Schema*/` to see what is available.

## Usage

### 1. Access token and schema factory

First of all, prepare an instance of `SerwisantApi\Api` for later use. It should be shared across the whole application.
You can expose it as a singleton, put it into a dependency injection container, etc. Don't create more than one
`SerwisantApi\Api` instance - it's useless and inefficient.

```php
use Serwisant\SerwisantApi;

// get your own client ID and secret by creating an application via the Serwisant Online web page
$access_token = new SerwisantApi\AccessTokenOauth(
  'client',
  'secret',
  'public',
  new SerwisantApi\AccessTokenContainerEncryptedFile('some_string_as_encryption_key')
);

$api = new SerwisantApi\Api();
$api->setAccessToken($access_token);
```

The arguments of `AccessTokenOauth` are:

1. client ID,
2. client secret,
3. OAuth scope - the schema (or space-separated schemas) you want to access, e.g. `public`,
4. access token cache (container).

The 4th argument is optional, but ***STRONGLY*** recommended for performance reasons. The container persists the access
token between requests until it expires, which avoids creating a new token for every HTTP request. Available
containers:

- `SerwisantApi\AccessTokenContainerEncryptedFile` - caches data in an encrypted local file. It can be used in a
  single-server application with access to the local filesystem. Constructor arguments: encryption key, optional
  directory (defaults to `TMPDIR` or the system temp directory), optional namespace.
- `SerwisantApi\AccessTokenContainerFile` - caches data in a plain-text local file. It can be used in a single-server
  application with access to the local filesystem. ***Please note*** - it's insecure on shared hosting, because plain
  access tokens are saved in the temp directory (e.g. `/tmp`), which may be accessible to other users.
- `SerwisantApi\AccessTokenContainerSession` - stores the token in the PHP session (`$_SESSION`). It should be used
  only with `AccessTokenOauthUserCredentials` to store a user-specific access token (fetched using login and password).
  Please don't use it for client ID/secret only access tokens. The session must be started (`session_start()`) before
  the container is used.
- `SerwisantApi\AccessTokenContainerSqlite` - SQLite database based cache, easy to set up. Requires the `PDO` and
  `pdo_sqlite` extensions. When using this container you don't need to worry about the database - it will be created
  automatically on first use. Constructor arguments: optional path to the database file (defaults to a file in the temp
  directory), optional namespace.
- `SerwisantApi\AccessTokenContainerPDO` - generic PDO token container. The first constructor argument is an array
  of `PDO` constructor arguments (DSN, user, password), the second is an optional namespace. Please note: you must
  create the table before first use. Table schema:

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

```php
$container = new SerwisantApi\AccessTokenContainerPDO(
  ['mysql:host=127.0.0.1;dbname=app', 'db_user', 'db_password'],
  'my_application'
);
```

- ...or build your own by implementing the `SerwisantApi\AccessTokenContainer` interface.

The `namespace` argument lets you keep several independent tokens (e.g. for different scopes or applications) in the
same storage. It must be between 6 and 64 characters long.

***PLEASE NOTE*** - your application can be banned if you create too many access tokens, e.g. one for every single
request.

### 2. Basic example with an inline query

Put a query string into a variable and execute it directly. The most important thing is to add the magic field
`__typename` to each requested object in your query. It tells the GraphQL server to return the object type name, which
the SDK uses to wrap the result in the proper PHP class. The result will be a PHP object (or an array of objects) with
all requested fields available as properties.

A missing magic field for any type will result in an exception.

```php
use Serwisant\SerwisantApi;

/* @var SerwisantApi\Api $api */

/* please note __typename at each type - it's required for proper typecasting */
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

The example above can be written in another way.

Create a folder named `queries/SchemaPublic` in your application's root directory (the name of the subfolder matches
the generated types namespace - see the [schemas table](#available-schemas)).

Next, put the content of your query string into the `queries/SchemaPublic/repairByToken.graphql` file. The file name is
important: it must be exactly the query name as seen in the schema. The file extension must be `.graphql`.

This is exactly the same query you assigned to a variable in example 2.

```php
use Serwisant\SerwisantApi;

/* @var SerwisantApi\Api $api */

// tell SerwisantApi\Api where to look for files with queries, mutations, etc. It can be done once, in example 1.
$api->addLoadPath('/full/path/to/queries/SchemaPublic');

/* @var SerwisantApi\Types\SchemaPublic\PublicQuery $query */
$query = $api->publicQuery();

/* @var SerwisantApi\Types\SchemaPublic\Repair $repair */
$repair = $query->repairByToken('abc-def'); // abc-def is a repair token fetched from user input

echo $repair->displayName;
echo $repair->status->displayName;
```

You can call `addLoadPath()` multiple times - all registered paths are searched in order, and the first matching file
wins. Query files are also looked up in the `queries/` directory shipped with the SDK.

Every generated query/mutation method accepts an additional, last argument `$vars` - an array of extra GraphQL
variables that are not schema arguments (see the hint below).

Probably you want to ask: why doesn't the SDK provide files with all available queries and mutations?

That's because we have no idea which fields/objects you want to fetch from the schema. The ability to limit fetched
data is one of the most important features of GraphQL. With pre-defined query files you would lose the possibility to
decide for yourself.

***HINT*** Using GraphQL syntax you can have multiple query variants in a single `.graphql` file and select the proper
one using query variables. Look at the example below. Let's have `repairByToken.graphql`. Pay attention to the
multiple `repairByToken` fields and the `@include(if: ..)` directive.

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

Call to get only the repair status (the query will be executed fast):

```php
$query = $api->publicQuery();
$repair = $query->repairByToken('abc-def', ['basic' => true]);
```

Call to get complete information about the repair (query execution can take more time):

```php
$query = $api->publicQuery();
$repair = $query->repairByToken('abc-def', ['complete' => true]);
```

### 4. Batched query

One of the cool GraphQL features is the possibility to put more than one query into a single request. You need to
give a unique alias to each query, and once it's executed, the result will contain both responses.

Use batches for performance reasons. Batching queries reduces HTTP traffic.

```php
use Serwisant\SerwisantApi;

/* @var SerwisantApi\Api $api */

/* please note __typename at each type - it's required for proper typecasting */
$query = '
query($token: String!) {
  repair: repairByToken(token: $token) {
    __typename
    displayName
  }
  me: viewer {
    __typename
    subscriber {
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
echo $me->subscriber->displayName;
```

When `fetch()` is called without an argument, the first result is returned.

***HINT*** you can put a batched query (let's assume it's the query above) into a query folder under a custom name and
call it like this:

```php
$result = $api->publicQuery()->newRequest()->setFile('myBatchedQuery.graphql', ['token' => $secret_token])->execute();
$repair = $result->fetch('repair');
$me = $result->fetch('me');
```

`setFile()` accepts either a file name resolved against the registered load paths, or an absolute path.

### 5. User credentials (login and password)

The `customer` schema requires a token issued for a specific user (OAuth password grant), not an application-only
token. Use `AccessTokenOauthUserCredentials` together with `AccessTokenContainerSession`:

```php
use Serwisant\SerwisantApi;

session_start();

$access_token = new SerwisantApi\AccessTokenOauthUserCredentials(
  'client',
  'secret',
  'customer',
  new SerwisantApi\AccessTokenContainerSession()
);

$api = new SerwisantApi\Api();
$api->setAccessToken($access_token);

if (!$access_token->isAuthenticated()) {
  // throws SerwisantApi\ExceptionUnauthorized on wrong login or password
  $access_token->login($login, $password);
}

// ... use $api->customerQuery() / $api->customerMutation()

// on logout: revokes the token on the server and clears the container
$access_token->revoke();
```

Once logged in, the token is refreshed automatically using the refresh token stored in the container. When the refresh
token is missing or no longer valid, `SerwisantApi\ExceptionUserCredentialsRequired` is thrown and the user must log in
again.

### 6. Error handling

All exceptions thrown by the SDK extend `SerwisantApi\Exception`:

- `ExceptionAccessDenied` - invalid client ID/secret, insufficient scope, or the API returned error code 403,
- `ExceptionUnauthorized` - invalid user login or password,
- `ExceptionUserCredentialsRequired` - a user token is required, but the user is not logged in,
- `ExceptionNotFound` - the API returned error code 404 (e.g. an object with the given ID or token does not exist),
- `ExceptionSubscriberGone` - the API returned error code 410 (subscriber account no longer exists),
- `ExceptionTooManyRequests` - HTTP 429, you are sending requests too fast,
- `SerwisantApi\Types\Exception` - the result cannot be cast to a PHP class (usually a missing `__typename`),
- `Exception` - any other error (network problem, GraphQL validation error, unexpected HTTP code, missing query file).

### 7. Debugging and custom HTTP headers

```php
$api->setDebug(1); // logs the request URL via error_log()
$api->setDebug(2); // logs the request URL and the query body

$api->setHttpHeaders(['X-Forwarded-For' => $client_ip]); // headers added to each OAuth and GraphQL request
```

## Changelog

See the [CHANGELOG](/CHANGELOG.md).

## Contributions

Pull requests are welcome.

Do not edit or update any files in the `src/Serwisant/SerwisantApi/Types/Schema*` directories - all classes there are
auto-generated and changes will be overwritten.

To regenerate types, queries and mutations use the `bin/introspection.php` script (run `composer install` in the SDK
directory first):

```
cd bin
php ./introspection.php
```

`bin/introspection.sh` removes the generated directories before running the script, so that types no longer present
in the schema are deleted as well.

## Development

The SDK is available as a Composer package on packagist.org. To release a new version:

- describe changes in `CHANGELOG.md`,
- update `version` in `composer.json`,
- commit and push changes to master,
- `git tag 3.5.x`,
- `git push origin --tags`.

There are environment variables to test/develop the SDK against a development server:

- set `SERWISANT_HOST` to e.g. `http://127.0.0.1:3000` to change the base URL for the OAuth token endpoint, the OAuth
  token revoke endpoint and the GraphQL schemas. Please note: SSL certificate verification is disabled for any host
  other than the production one.
- set `HTTP_TIMEOUT` to e.g. `10` to set a 10 s connection and request timeout to the API. Default is 30 s.
- `TMPDIR` is used as the default directory for file-based and SQLite token containers.

## Licensing

Apache License 2.0. See [LICENSE](/LICENSE) for full license information.

## Author

Arkadiusz Kuryłowicz <hello(at)sugarmice.software>
