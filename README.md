# Example request

```json
{
  "userId": "4829128349018",
  "invoiceData": {
    "invoiceNumber": "invoiceNumber",
    "notes": "notes",
    "billingPeriod": "billingPeriod",
    "tenderOrLotReferenceDocument": "tenderOrLotReferenceDocument",
    "invoicedObjectReferenceDocument": "invoicedObjectReferenceDocument",
    "contractReferencedDocument": "contractReferencedDocument",
    "procuringProject": "procuringProject",
    "paymentMeanToDirectDebit": "paymentMeanToDirectDebit",
    "paymentTerm": "paymentTerm",
    "sellerName": "sellerName",
    "sellerGlobalId": "sellerGlobalId",
    "sellerTaxNumber": "sellerTaxNumber",
    "sellerVATRegistrationNumber": "sellerVATRegistrationNumber",
    "sellerAddress": "sellerAddress",
    "sellerContact": {
      "contactPersonName": "contactPersonName",
      "contactDepartmentName": "contactDepartmentName",
      "contactPhoneNo": "contactPhoneNo",
      "contactFaxNo": "contactFaxNo",
      "contactEmailAddress": "contactEmailAddress"
    },
    "sellerCommunication": "sellerCommunication",
    "buyerName": "buyerName",
    "buyerAddress": "buyerAddress",
    "buyerContact": {
      "contactPersonName": "contactPersonName",
      "contactDepartmentName": "contactDepartmentName",
      "contactPhoneNo": "contactPhoneNo",
      "contactFaxNo": "contactFaxNo",
      "contactEmailAddress": "contactEmailAddress"
    },
    "buyerCommunication": "buyerCommunication",
    "payee": "payee",
    "buyerOrderReferencedDocument": "buyerOrderReferencedDocument",
    "sellerOrderReferencedDocument": "sellerOrderReferencedDocument",
    "shipTo": "shipTo",
    "shipToAddress": "shipToAddress",
    "deliveryDate": "deliveryDate",
    "positions": [
      {
        "positionId": "1",
        "productDetails": "iPhone 16 Pro",
        "netPrice": "1699.00",
        "quantity": "2",
        "tax": "19",
        "lineSummation": "3398.00"
      },
      {
        "positionId": "2",
        "productDetails": "AirPods Pro",
        "netPrice": "280.00",
        "quantity": "2",
        "tax": "19",
        "lineSummation": "560.00"
      }
    ],
    "tax": {
      "basisAmount": "100.0",
      "calculatedAmount": "19.0",
      "rateApplicablePercent": "19.0"
    },
    "summation": {
      "grandTotalAmount": "100.0",
      "duePayableAmount": "100.0"
    }
  }
}
```
