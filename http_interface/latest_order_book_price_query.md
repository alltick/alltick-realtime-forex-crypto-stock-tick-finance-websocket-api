> [English](./latest_order_book_price_query.md) | [中文](./latest_order_book_price_query_cn.md)

## GET Latest Depth Tick Query

GET /depth-tick
> Please refer to the complete URL in [API Address Description](./api_address_description.md)

### Request Parameters

| Name                   | Position | Type    | Required | Description                                                  |
| ---------------------- | -------- | ------- | -------- | ------------------------------------------------------------ |
| token                  | query    | string  | No       |                                                              |
| query                  | query    | string  | No       | See explanation for query request parameters                  |

> Query Request Parameters

Encode the following JSON into URL format and assign it to the `query` query string in the URL.
```json
{
  "trace": "edd5df80-df7f-4acf-8f67-68fd2f096426",
  "data": {
    "symbol_list": [
      {
        "code": "857.HK"
      },
      {
        "code": "UNH.US"
      }
    ]
  }
}
```

### Query Request Parameters

| Name       | Type   | Required | Description |
| ---------- | ------ | -------- | ----------- |
| trace      | string | Yes      |             |
| data       | object | Yes      |             |
| » symbol_list | [object] | Yes      |             |
| » » code       | string | No       | Code        |

> Response Example

> OK

```json
{
  "ret": 200,
  "msg": "ok",
  "trace": "edd5df80-df7f-4acf-8f67-68fd2f096426",
  "data": {
    "tick_list": [
      {
        "code": "857.HK",
        "seq": "30686349",
        "tick_time": "1677830357227",
        "bids": [
          {
            "price": "136.424",
            "volume": "100000.00"
          }
        ],
        "asks": [
          {
            "price": "136.427",
            "volume": "400000.00"
          }
        ]
      }
    ]
  }
}
```

### Response Result

| Status Code | Status Meaning | Description | Data Model |
| ----------- | -------------- | ----------- | ---------- |
| 200         | OK             | OK          | Inline     |

### Response Data Structure

Status Code **200**

| Name       | Type    | Required | Constraints | Chinese Name | Description |
| ---------- | ------- | -------- | ----------- | ------------ | ----------- |
| » ret      | integer | true     |             |              | Return code |
| » msg      | string  | true     |             |              | Message corresponding to the return code |
| » trace    | string  | true     |             |              | Request trace |
| » data     | object  | true     |             |              |             |
| »» tick_list | [object] | true  |             |              |             |
| »» » code    | string | false    |             |              | Code        |
| »» » seq     | string | false    |             |              | Quote sequence number |
| »» » tick_time | string | false |             |              | Quote timestamp |
| »» » bids    | [object] | false  |             |              | Bid list    |
| »» »» price  | string | false    |             |              | Price       |
| »» »» volume | string | false    |             |              | Volume      |
| »» » asks    | [object] | false  |             |              | Ask list    |
| »» »» price  | string | false    |             |              | Price       |
| »» »» volume | string | false    |             |              | Volume      |
