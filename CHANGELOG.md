# Changelog

## 3.5.0

### breaking changes

Schema `public`: `createTicket` argument `devices` has being replaced with `device`. Submitting multi-device ticket with
anonymous customer is no longer possible.

## 3.4.0

### breaking changes

Schema `customer`:

- arguments for `createRepair` changed. New argument `address` can be utilized to set custom pick-up/return addresses
- class `Repair`: fields `collectionType`, `collectionAddress`, `deliveryType` and `deliveryAddress` has being
  depreciated and removed. Use new fields instead.

Schema `service`:

- class `Repair`: fields `collectionType`, `collectionAddress`, `deliveryType` and `deliveryAddress` has being
  depreciated and removed. Use new fields instead.

Schema `public`:

- query method `customerCustomFields` has being depreciated and removed.
- class `Repair`: fields `collectionType`, `deliveryType`  has being depreciated and removed. Use new fields instead.
- class `Repair`: fields `collectionAddress` and `deliveryAddress` has being removed from schema (without depreciation).

Generic:

- method `toArray` in any data object (interhited from src/Serwisant/SerwisantApi/Types/Type.php) changed its argument -
  instead flag to exclude 'ID' it takes array of field names to exclude.

- env variables `GRAPHQL_URL`, `OAUTH_URL`, `OAUTH_REVOKE_URL` has being removed. See documentation for replacement.

- constant `\Serwisant\SerwisantApi\GraphqlRequest::URL` has being removed.
- constant `\Serwisant\SerwisantApi\AccessToken::URL` has being removed.
- constant `\Serwisant\SerwisantApi\AccessToken::REVOKE_URL` has being removed.

## 3.3.0

### breaking changes

Schema `customer`:

- depreciation of `address` and `address_other` fields in `TicketInput` type (creating new ticket) - it's replaced
  with `address` argument in `createTicket` mutation - each ticket now have its own address not related to customer
  address but can be copy of customer address.
- arguments for `createTicket` changed:

```
-  public function createTicket(TicketInput $ticket, array $temporaryFiles = array(), array $devices = array(), TicketCreationOptions $options = null, $vars = array())
+  public function createTicket(TicketInput $ticket, array $temporaryFiles = array(), array $devices = array(), AddressInput $address = null, TicketCreationOptions $options = null, $vars = array())
```

Schema `public`:

- depreciation of `customerCustomFields` query - it's replaced by new `customFields` with proper filter

### other changes

- new schema `Mobile`
- schema `public` now accept anonymous submission of ticket including all related data like files, priorities, etc.

## 3.2.0

### breaking changes

- arguments for `createRepair` in customer schema changed
- arguments for `createTicket` in customer schema changed

### other changes:

- new queries related to devices in customer schema
- notes in service schema
- repair delegation in service schema

## 3.1.0

### breaking changes

- removed `AccessTokenContainerShm` - it's useless and possibly confusing
- **BREAKING CHANGES** added `getRefreshToken()` to `AccessTokenContainer` interface - any custom container must be
  updated to reflect this change
- added `AccessTokenContainerEncryptedFile` - encrypted file-based container to be used on shared hosting
- added `AccessTokenOauthUserCredentials` for user-password access tokens.
- new `customer` schema
- **BREAKING CHANGES** replaced an enum input argument classes with plain strings (defined in appropriate class
  constants)
- **BREAKING CHANGES** fields ID in CustomFieldValueInput and CustomerAgreementInput has been deprecated and disappeared
  from PHP classes
- null list input arguments now are optional (default as empty array)
- other changes in types to reflect Serwisant Online API update

## 3.0.5

- schema update, added optional method argument to each query/mutation call to pass non-arguments variables, like query
  conditionals, etc
