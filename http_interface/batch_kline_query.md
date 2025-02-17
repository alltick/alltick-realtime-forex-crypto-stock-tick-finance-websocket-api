> [English](./batch_kline_query.md) | [中文](./batch_kline_query_cn.md)

## POST Query the latest 2 K lines of products in batches

POST /batch-kline

> Please refer to the complete URL in [API Address Description](./api_address_description.md)

### Interface Description

This interface can query multiple products in batches at one time, and can query multiple k-line types in batches at one time (k-line types refer to 1 minute, 15 minutes, 30 minutes, etc.), but can only query the latest 2 k-lines in batches.

### Request Frequency

| Plan          | Individual request                                           | Request multiple HTTP interfaces                             |
| ------------- | ------------------------------------------------------------ | ------------------------------------------------------------ |
| Free          | 1、1 request allowed every 10 seconds.<br />2、Each query can batch retrieve 10 items, where 10 equals the product count times the candlestick type. | 1、One request per second.<br />2、/batch-kline needs 10-second intervals.<br />3、Total of 10 requests per minute (every 6 seconds).<br />4、Max 14400 daily requests; excess resets at midnight. |
| Basic         | 1、1 request every 3 seconds.<br />2、Each query can batch retrieve 100 items, where 100 equals the product count times the candlestick type. | 1、One request per second.<br />2、/batch-kline: 1 request every 3 seconds.<br />3、Total of 60 requests per minute (1 request per second).<br />4、Max 86400 daily requests; excess resets at midnight. |
| Premium       | 1、1 request every 2 seconds.<br />2、Each query can batch retrieve 200 items, where 200 equals the product count times the candlestick type. | 1、Combined interfaces: 10 requests/second.<br />2、/batch-kline: 1 request/2 seconds.<br />3、Total: 600 requests/minute (10/second).<br />4、Daily limit: 864,000 requests; reset daily at midnight if exceeded. |
| Professional  | 1、1 request per second.<br />2、Each query can batch retrieve 500 items, where 500 equals the product count times the candlestick type. | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
| All HK Stocks | 1、1 request per second.<br />2、Each query can batch retrieve 500 items, where 500 equals the product count times the candlestick type. | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
| All CN Stocks | 1、1 request per second.<br />2、Each query can batch retrieve 500 items, where 500 equals the product count times the candlestick type. | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |

## API Endpoints

1. **US Stocks, Hong Kong Stocks, A Shares, Major Index Data API Endpoints:**

   - **Base Path:** `/quote-stock-b-api/batch-kline`

   - **Full URL:** `https://quote.alltick.io/quote-stock-b-api/batch-kline`

     

2. **Forex, Precious Metals, Cryptocurrencies, Commodities API Endpoints:**

   - **Base Path:** `/quote-b-api/batch-kline`

   - **Full URL:** `https://quote.alltick.io/quote-b-api/batch-kline`

     

## Request Examples

1. **Request Example for US Stocks, Hong Kong Stocks, A Shares, Major Index Data:** <br />The batch query function for retrieving the latest K-line data requires many parameters, which should be included in the request body. Only the `token` parameter should be included in the URL. <br />When sending the query request, you must include the method name and token information. An example request is as follows:

   https://quote.alltick.io/quote-stock-b-api/batch-kline?token=your_token
 

2. **Request Example for Forex, Precious Metals, Cryptocurrencies, Commodities:** <br />The batch query function for retrieving the latest K-line data requires many parameters, which should be included in the request body. Only the `token` parameter should be included in the URL. <br />When sending the query request, you must include the method name and token information. An example request is as follows:

   https://quote.alltick.io/quote-b-api/batch-kline?token=your_token


### Batch Code Latest K-Line Query functionality. Due to the large number of batch query parameters, they are placed in the body, with only the token field parameter remaining in the URL parameters.

> Body Request Parameters

```json
{
  "trace": "py_http_test1",
  "data": {
    "data_list": [
      {
        "code": "700.HK",
        "kline_type": 1,
        "kline_timestamp_end": 0,
        "query_kline_num": 1,
        "adjust_type": 0
      },
      {
        "code": "GOOGL.US",
        "kline_type": 1,
        "kline_timestamp_end": 0,
        "query_kline_num": 1,
        "adjust_type": 0
      }
    ]
  }
}
```

### Request Parameters

| Name            | Position | Type     | Required | Description                                              |
|-----------------|----------|----------|----------|----------------------------------------------------------|
| token           | query    | string   | Yes      | If you don't know your token, please contact the relevant personnel to request |
| body            | body     | object   | No       |                                                          |
| » trace         | body     | string   | Yes      | Trace code, used for querying logs, please ensure it's unique for each request |
| » data          | body     | object   | Yes      |                                                          |
| »» data_list    | body     | [object] | Yes      |                                                          |
| »»» code        | body     | string   | Yes      | Please refer to the code list and select the code you want to query |
| »»» kline_type  | body     | integer  | Yes      | K-line type, 1 for 1-minute K, 2 for 5-minute K, 3 for 15-minute K, 4 for 30-minute K, 5 for hourly K, 6 for 2-hour K, 7 for 4-hour K, 8 for daily K, 9 for weekly K, 10 for monthly K (Note: Stocks do not support 2-hour K and 4-hour K)|
| »»» kline_timestamp_end | body | integer | Yes    | From which timestamp to query backward, 0 means from the current time, only effective for non-stock type codes |
| »»» query_kline_num | body     | integer  | Yes      | Number of K-lines to query, up to 1 or 2    |
| »»» adjust_type | body     | integer  | Yes      | Adjustment type, only effective for stock type codes, e.g., 0: ex-right, 1: pre-adjustment, currently only supports 0 |


> Response Example

> OK

```json
{
  "ret": 200,
  "msg": "ok",
  "trace": "asdfsdfa",
  "data": {
    "kline_list": [
      {
        "code": "700.HK",
        "kline_type": 1,
        "kline_data": [
          {
            "timestamp": "1677829200",
            "open_price": "136.421",
            "close_price": "136.412",
            "high_price": "136.422",
            "low_price": "136.407",
            "volume": "0",
            "turnover": "0"
          }
        ]
      },
      {
        "code": "GOOGL.US",
        "kline_type": 1,
        "kline_data": [
          {
            "timestamp": "1677829200",
            "open_price": "136.421",
            "close_price": "136.412",
            "high_price": "136.422",
            "low_price": "136.407",
            "volume": "0",
            "turnover": "0"
          }
        ]
      }
    ]
  }
}
```

### Response

| Status Code | Status Meaning | Explanation | Data Model |
|-------------|----------------|-------------|------------|
| 200         | OK             | OK          | Inline     |

### Response Data Structure

Status Code **200**

| Name           | Type     | Required | Constraints | Chinese Name | Description      |
|----------------|----------|----------|-------------|--------------|------------------|
| » ret          | integer  | true     |             |              |                  |
| » msg          | string   | true     |             |              |                  |
| » trace        | string   | true     |             |              |                  |
| » data         | object   | true     |             |              |                  |
| »» kline_list  | [array]  | true     |             |              |                  |
| »»» code       | string   | true     |             |              | Product Code     |
| »»» kline_type | integer  | true     |             |              | K-line type, where 1 represents 1-minute K, 2 for 5-minute K, 3 for 15-minute K, 4 for 30-minute K, 5 for hour K, 6 for 2-hour K, 7 for 4-hour K, 8 for daily K, 9 for weekly K, and 10 for monthly K (Note: Stocks do not support 2-hour K and 4-hour K)|
| »»» kline_data | [array]  | true     |             |              |                  |
| »»»» timestamp | string   | true     |             |              | Timestamp of the K-line  |
| »»»» open_price| string   | true     |             |              | Opening price of the K-line |
| »»»» close_price| string  | true     |             |              | Closing price of the K-line |
| »»»» high_price| string   | true     |             |              | Highest price of the K-line |
| »»»» low_price | string   | true     |             |              | Lowest price of the K-line |
| »»»» volume    | string   | true     |             |              | Volume of the K-line |
| »»»» turnover  | string   | true     |             |              | Turnover of the K-line |
