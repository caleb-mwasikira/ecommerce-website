
![How the Daraja API works]


-------------------------------------------------

## Validating M-PESA Transactions

Now that we understand how the M-PESA Daraja API works, we can now begin to architect how the business (Green Boutique) will validate payment transactions.

**The process is explained below:**
1. Green Boutique will receive a Validation Request from the Daraja API at the Validation URL registered on the pay bill/till number. The Validation Request will be in the form of a JSON message as described below:


**Validation Request**

```json
{    
   "TransactionType": "Pay Bill",
   "TransID":"RKTQDM7W6S",
   "TransTime":"20191122063845",
   "TransAmount":"10",
   "BusinessShortCode": "600638",
   "BillRefNumber":"invoice008",
   "InvoiceNumber":"",
   "OrgAccountBalance":"",
   "ThirdPartyTransID": "",
   "MSISDN":"25470****149",
   "FirstName":"John",
   "MiddleName":"",
   "LastName":"Doe"
}
```

2. We will then capture the `BillRefNumber` field of the Validation Request JSON message and check if there are any recent pending orders with a matching `account_number`
3. 

**Accepted Validation Response**

```json
{    
   "ResultCode": "0",
   "ResultDesc": "Accepted",
}
```


**Rejected Validation Response**

```json
{    
   "ResultCode": "C2B00011",
   "ResultDesc": "Rejected",
}
```

**Result Error Codes**

|   |   |
|---|---|
|**ResultCode**|**ResultDesc**|
|C2B00011|Invalid MSISDN|
|C2B00012|Invalid Account Number|
|C2B00013|Invalid Amount|
|C2B00014|Invalid KYC Details|
|C2B00015|Invalid Shortcode|
|C2B00016|Other Error|


# Confirming M-PESA Transactions

