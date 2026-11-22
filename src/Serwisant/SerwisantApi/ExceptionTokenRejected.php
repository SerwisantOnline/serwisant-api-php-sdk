<?php

namespace Serwisant\SerwisantApi;

/**
 * Internal: the API rejected the access token sent with a GraphQL request. Never leaves GraphqlClient::call() - it is
 * handled by refreshing the token and retrying the request once.
 *
 * @internal
 */
class ExceptionTokenRejected extends Exception
{

}
