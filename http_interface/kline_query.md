> [English](./kline_query.md) | [中文](./kline_query_cn.md)

## GET K-Line Query

GET /kline
> Please refer to the complete URL in [API Address Description](./api_address_description.md)

### Interface Description

This interface can be used to query historical K-lines, but only one product can be queried at a time. It is recommended to cache the queried historical K-lines locally.

### Request Frequency

| Text          | Text                                              | Text                                                         |
| ------------- | ------------------------------------------------- | ------------------------------------------------------------ |
| Free          | Once every 10 seconds, only 1 request can be made | 1、One request per second.<br />2、/batch-kline needs 10-second intervals.<br />3、Total of 10 requests per minute (every 6 seconds).<br />4、Max 14400 daily requests; excess resets at midnight. |
| Basic         | Only 1 request per second                         | 1、One request per second.<br />2、/batch-kline: 1 request every 3 seconds.<br />3、Total of 60 requests per minute (1 request per second).<br />4、Max 86400 daily requests; excess resets at midnight. |
| Premium       | Up to 10 requests per second                      | 1、Combined interfaces: 10 requests/second.<br />2、/batch-kline: 1 request/2 seconds.<br />3、Total: 600 requests/minute (10/second).<br />4、Daily limit: 864,000 requests; reset daily at midnight if exceeded. |
| Professional  | Up to 20 requests per second                      | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
| All HK Stocks | Up to 20 requests per second                      | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
| All CN Stocks | Up to 20 requests per second                      | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |


### API Endpoints

1.**US Stocks, Hong Kong Stocks, A Shares, Major Index Data API Endpoints:**

- **Base Path:** `/quote-stock-b-api/kline`
- **Full URL:** `https://quote.tradeswitcher.com/quote-stock-b-api/kline`

2.**Forex, Precious Metals, Cryptocurrencies, Commodities API Endpoints:**

- **Base Path:** `/quote-b-api/kline`

- **Full URL:** `https://quote.tradeswitcher.com/quote-b-api/kline`


### Request Examples

1.**Request Example for US Stocks, Hong Kong Stocks, A Shares, Major Index Data:**

When sending a query request, you must include the method name and token information. An example request is as follows: `https://quote.tradeswitcher.com/quote-stock-b-api/kline?token=your_token&query=queryData`

2.**Request Example for Forex, Precious Metals, Cryptocurrencies, Commodities:**

When sending a query request, you must include the method name and token information. An example request is as follows: `https://quote.tradeswitcher.com/quote-b-api/kline?token=your_token&query=queryData`


### Request Parameters

| Name       | Position | Type   | Required | Description                                           |
| ---------- | -------- | ------ | -------- | ----------------------------------------------------- |
| token      | query    | string | No       |                                                       |
| query      | query    | string | No       | See explanation for query request parameter below     |

> Explanation for query request parameter

Encode the following JSON using URL encoding and assign it to the 'query' query string in the URL:
```json
{
  "trace": "3baaa938-f92c-4a74-a228-fd49d5e2f8bc-1678419657806",
  "data": {
    "code": "857.HK",
    "kline_type": 1,
    "kline_timestamp_end": 0,
    "query_kline_num": 2,
    "adjust_type": 0
  }
}
```

### Query Request Parameters

| Name                 | Type    | Required | Description                                           |
| -------------------- | ------- | -------- | ----------------------------------------------------- |
| trace                | string  | Yes      | Trace code used for logging purposes, ensure uniqueness for each request |
| data                 | object  | Yes      |                                                       |
| » code               | string  | Yes      | Refer to the code list and select the code you want to query |
| » kline_type         | integer | Yes      | Type of K-line: 1 minute K, 2 for 5-minute K, 3 for 15-minute K, 4 for 30-minute K, 5 for hourly K, 6 for 2-hour K, 7 for 4-hour K, 8 for daily K, 9 for weekly K, 10 for monthly K (Note: Stocks do not support 2-hour K and 4-hour K)|
| » kline_timestamp_end| integer | Yes      | Indicates the time point to query backward from. Set to 0 for current time, only effective for non-stock type codes |
| » query_kline_num    | integer | Yes      | Number of K-lines to query, maximum of 1000 |
| » adjust_type        | integer | Yes      | Adjustment type, effective only for stock codes, e.g., 0: ex-rights, 1: pre-adjustment, currently only supports 0 |

> Response Example
> OK

```json
{
  "ret": 200,
  "msg": "ok",
  "trace": "3baaa938-f92c-4a74-a228-fd49d5e2f8bc-1678419657806",
  "data": {
    "code": "857.HK",
    "kline_type": 1,
    "kline_list": [
      {
        "timestamp": "1677829200",
        "open_price": "136.421",
        "close_price": "136.412",
        "high_price": "136.422",
        "low_price": "136.407",
        "volume": "0",
        "turnover": "0"
      },
      {
        "timestamp": "1677829260",
        "open_price": "136.412",
        "close_price": "136.401",
        "high_price": "136.415",
        "low_price": "136.397",
        "volume": "0",
        "turnover": "0"
      }
    ]
  }
}
```

### Response Results

| Status Code | Status Code Meaning | Description | Data Model |
| ----------- | ------------------- | ----------- | ---------- |
| 200         | OK                  | OK          | Inline     |

### Response Data Structure

Status Code **200**

| Name            | Type      | Required | Constraints | Chinese Name | Description                                                 |
| --------------- | --------- | -------- | ----------- | ------------ | ----------------------------------------------------------- |
| » ret           | integer   | true     |             |              |                                                             |
| » msg           | string    | true     |             |              |                                                             |
| » trace         | string    | true     |             |              |                                                             |
| » data          | object    | true     |             |              |                                                             |
| »» code         | string    | true     |             |              | Code                                                        |
| »» kline_type   | integer   | true     |             |              | Type of K-line: 1 minute K, 2 for 5-minute K, 3 for 15-minute K, 4 for 30-minute K, 5 for hourly K, 6 for 2-hour K, 7 for 4-hour K, 8 for daily K, 9 for weekly K, 10 for monthly K (Note: Stocks do not support 2-hour K and 4-hour K)|
| »» kline_list   | [object]  | true     |             |              |                                                             |
| »»» timestamp   | string    | true     |             |              | Timestamp of the K-line                                     |
| »»» open_price  | string    | true     |             |              | Opening price of the K-line                                 |
| »»» close_price | string    | true     |             |              | Closing price of the K-line                                 |
| »»» high_price  | string    | true     |             |              | Highest price of the K-line                                 |
| »»» low_price   | string    | true     |             |              | Lowest price of the K-line                                  |
| »»» volume      | string    | true     |             |              | Trading volume of the K-line                                |
| »»» turnover    | string    | true     |             |              | Trading turnover of the K-line                              |

