<?php

namespace Serwisant\SerwisantApi\Types\SchemaPublic;

use Serwisant\SerwisantApi;
use Serwisant\SerwisantApi\Types;

class RepairCosts extends Types\Type
{
  /**
   * @var Decimal
  */
  public $estimatedGross;

  /**
   * @var Decimal
   * Net price given in repair diagnosis, this is a price customer must confirm. If null, diagnosis wan't performed,
no price given durring diagnosis or sepatate offers for this repair exists - see offer field

  */
  public $estimatedNet;

  /**
   * @var Decimal
  */
  public $finalGross;

  /**
   * @var Decimal
   * Net price to be paid for repair
  */
  public $finalNet;

  /**
   * @var Decimal
   * Full price (incl. tax) to be paid for whole service, decucted by advance, incremented by other possibe costs like shipping, etc.
  */
  public $payment;

  /**
   * @var Decimal
  */
  public $proposedGross;

  /**
   * @var Decimal
   * Net price proposed durring repair aquisition, nil if nothing was proposed, it's not a real price, rather a guess
  */
  public $proposedNet;

  protected function schemaNamespace()
  {
    return 'SchemaPublic';
  }
}