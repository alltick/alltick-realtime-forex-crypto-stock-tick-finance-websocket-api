> [English](./latest_transaction_price_query.md) | [中文](./latest_transaction_price_query_cn.md)

## GET Latest Trade Tick Query

## GET /trade-tick

### Interface Description
This interface supports batch requests for the latest trade prices (latest tick data) but does not support requests for historical trade prices (historical tick data).

### Request Frequency

| Text          | Text                                                         | Text                                                         |
| ------------- | ------------------------------------------------------------ | ------------------------------------------------------------ |
| Free          | 1、Once every 10 seconds, only 1 request can be made <br />2、5 products per batch max | 1、One request per second.<br />2、/batch-kline needs 10-second intervals.<br />3、Total of 10 requests per minute (every 6 seconds).<br />4、Max 14400 daily requests; excess resets at midnight. |
| Basic         | 1、Only 1 request per second <br />2、Suggest 50 code requests max due to GET URL length limit | 1、One request per second.<br />2、/batch-kline: 1 request every 3 seconds.<br />3、Total of 60 requests per minute (1 request per second).<br />4、Max 86400 daily requests; excess resets at midnight. |
| Premium       | 1、Up to 10 requests per second <br />2、Suggest 50 code requests max due to GET URL length limit | 1、Combined interfaces: 10 requests/second.<br />2、/batch-kline: 1 request/2 seconds.<br />3、Total: 600 requests/minute (10/second).<br />4、Daily limit: 864,000 requests; reset daily at midnight if exceeded. |
| Professional  | 1、Up to 20 requests per second <br />2、Suggest 50 code requests max due to GET URL length limit | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
| All HK Stocks | 1、Up to 20 requests per second <br />2、Suggest 50 code requests max due to GET URL length limit | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
| All CN Stocks | 1、Up to 20 requests per second <br />2、Suggest 50 code requests max due to GET URL length limit | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |

### Interface Limitations
- 1、Please be sure to read:[HTTP Interface Limitations](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/http_interface/interface_limitation_cn.md)
- 2、Please be sure to read:[Error Code Descriptions](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/error_code_description_cn.md)

### API Endpoints

**1、US Stocks, Hong Kong Stocks, A Shares, Major Index Data API Endpoints:**

- **Base Path:** `/quote-stock-b-api/trade-tick`
- **Full URL:** `https://quote.alltick.co/quote-stock-b-api/trade-tick`


**2、Forex, Precious Metals, Cryptocurrencies, Commodities API Endpoints:**

- **Base Path:** `/quote-b-api/trade-tick`
- **Full URL:** `https://quote.alltick.co/quote-b-api/trade-tick`


### Request Examples

**1、Request Example for US Stocks, Hong Kong Stocks, A Shares, Major Index Data:** <br />When sending a query request, you must include the method name and token information. An example request is as follows:

https://quote.alltick.co/quote-stock-b-api/trade-tick?token=your_token&query=queryData


**2、Request Example for Forex, Precious Metals, Cryptocurrencies, Commodities:** <br />When sending a query request, you must include the method name and token information. An example request is as follows:

https://quote.alltick.co/quote-b-api/trade-tick?token=your_token&query=queryData



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
| »» code        | string    | No       | Refer to the code list and select the code you want to query：[Click on the code list](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863)     |

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
