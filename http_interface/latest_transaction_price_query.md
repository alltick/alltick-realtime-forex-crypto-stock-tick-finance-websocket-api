> [English](./latest_transaction_price_query.md) | [中文](./latest_transaction_price_query_cn.md)

## GET Latest Trade Tick Query

GET /trade-tick
> Please refer to the complete URL in [API Address Description](./api_address_description.md)


### Request Parameters

| Name      | Position | Type   | Required | Description                                      |
| --------- | -------- | ------ | -------- | ------------------------------------------------ |
| token     | query    | string | No       |                                                  |
| query     | query    | string | No       | See explanation of query request parameters below |

> Query Request Parameters

The following JSON should be URL-encoded and assigned to the `query` query string in the URL.
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

| Name           | Type      | Required | Description |
| -------------- | --------- | -------- | ----------- |
| trace          | string    | Yes      |             |
| data           | object    | Yes      |             |
| » symbol_list  | [object]  | Yes      |             |
| »» code        | string    | No       | Code        |

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
        "seq": "30841439",
        "tick_time": "1677831545217",
        "price": "136.302",
        "volume": "0",
        "turnover": "0",
        "trade_direction": 0
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

| Name              | Type     | Required | Constraint | Chinese Name | Description |
| ----------------- | -------- | -------- | ---------- | ------------ | ----------- |
| » ret             | integer  | true     |            |              | Return code |
| » msg             | string   | true     |            |              | Message corresponding to the return code |
| » trace           | string   | true     |            |              | Request trace |
| » data            | object   | true     |            |              |             |
| »» tick_list      | [object] | true     |            |              |             |
| »»» code          | string   | false    |            |              | Code        |
| »»» seq           | string   | false    |            |              | Sequence    |
| »»» tick_time     | string   | false    |            |              | Timestamp   |
| »»» price         | string   | false    |            |              | Price       |
| »»» volume        | string   | false    |            |              | Volume      |
| »»» turnover      | string   | false    |            |              | Turnover    |
| »»» trade_direction | integer | false    |            |              | Trading direction, 0 for default, 1 for BUY, 2 for SELL |
