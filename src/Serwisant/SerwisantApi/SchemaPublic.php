<?php

namespace Serwisant\SerwisantApi;

class SchemaPublic extends Graphql
{
  protected function schemaPath()
  {
    return 'public';
  }

  public function repairByToken($token)
  {
    $query = <<<'QUERY'
query repairByToken($token: String!) {
  repairByToken(token: $token) {
    serviceSupplier {
      displayName
      address {
        street
        building
        city
        postalCode
        countryIso
      }
      phone {
        number
        countryPrefix
      }
      email
      avatar {
        url
      }
    }
    rma
    displayName
    type {
      name
    }
    advanceAmount
    deliveryType
    collectionType
    issue
    priceEstimated
    priceEstimatedTaxRate
    serial
    vendor
    model
    warranty
    warrantyPurchaseDate
    warrantyPurchaseDocument
    customFields {
      field {
        name
        description
        type
      }
      value
    }
    status {
      status
      displayName
      progress
      createdAt
      startedAt
      daysFromStart
      finishDateEstimated
      timeStatus
      isDiagnosed
      isFinished
      isCanceledOrRejected
      isSummedUp
      isConfirmed
    }
    costs {
      proposedNet
      proposedGross
      estimatedNet
      estimatedGross
      finalNet
      finalGross
      payment
    }
    diagnosis {
      publicRemarks
    }
    summary {
      publicRemarks
    }
    offers {
      ID
      number
      title
      description
      priceNet
      priceGross
      accepted
      items {
        description
        priceNet
        vat
        priceGross
        type
      }
    }
  }
}
QUERY;
    return $this->callSingle('repairByToken', $query, ['token' => $token]);
  }

  function configByToken($token)
  {
    $query = <<<'QUERY'
query configByToken($token: String!) {
  configByToken(token: $token) {
    showOrderProgressInfo
  }
}
QUERY;
    return $this->callSingle('configByToken', $query, ['token' => $token]);
  }
}