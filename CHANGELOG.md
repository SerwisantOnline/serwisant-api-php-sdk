# Changelog

## 3.1.0 - BREAKING CHANGES

- removed `AccessTokenContainerShm` - it's useless and possibly confusing
- **BREAKING CHANGES** added `getRefreshToken()` to `AccessTokenContainer` interface - any custom container must be
  updated to reflect this change
- added `AccessTokenContainerEncryptedFile` - encrypted file-based container to be used on shared hosting
- added `AccessTokenOauthUserCredentials` for user-password access tokens.
- new `customer` schema
- **BREAKING CHANGES** replaced an enum input argument classes with plain strings (defined in appropriate class
  constants)
- **BREAKING CHANGES** fields ID in CustomFieldValueInput and CustomerAgreementInput has been deprecated and disapeared from PHP classes
- null list input arguments now are optional (default as empty array)
- other changes in types to reflect Serwisant Online API update

## 3.0.5

- schema update, added optional method argument to each query/mutation call to pass non-arguments variables, like query
  conditionals, etc
