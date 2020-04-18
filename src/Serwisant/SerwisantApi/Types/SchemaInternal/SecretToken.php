<?php

namespace Serwisant\SerwisantApi\Types\SchemaInternal;

use Serwisant\SerwisantApi\Types;

class SecretToken extends Types\Obj
{
  /**
   * @var string
  */
  public $oauthClientId;

  /**
   * @var string
  */
  public $oauthClientSecret;

  /**
   * @var string
  */
  public $oauthScopes;

  /**
   * @var SecretTokenSubject
  */
  public $subjectType;

}