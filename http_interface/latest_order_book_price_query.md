> [English](./latest_order_book_price_query.md) | [中文](./latest_order_book_price_query_cn.md)

## GET Latest Depth Tick Query

## GET /depth-tick

### Interface Description

The following is the maximum market depth for each product type:

1. It is normal for inactive products to be smaller than the maximum range listed below.
2. There is a situation where the unilateral depth is empty. For example, when the stock price limit rises or falls, the unilateral market opening may be empty.

|                    | FX、Metals      | Cryptocurrency  | HK Stocks        | CN Stocks       |
| ---------------------- | --------------- | --------------- | ---------------- | --------------- |
| Order Book Description | Maximum 1 gears | Maximum 5 gears | Maximum 10 gears | Maximum 5 gears |



### Request Frequency

| Plan          | Individual request                                | Request multiple HTTP interfaces                             |
| ------------- | ------------------------------------------------- | ------------------------------------------------------------ |
| Free          | Once every 10 seconds, only 1 request can be made | 1、One request per second.<br />2、/batch-kline needs 10-second intervals.<br />3、Total of 10 requests per minute (every 6 seconds).<br />4、Max 14400 daily requests; excess resets at midnight. |
| Basic         | Only 1 request per second                         | 1、One request per second.<br />2、/batch-kline: 1 request every 3 seconds.<br />3、Total of 60 requests per minute (1 request per second).<br />4、Max 86400 daily requests; excess resets at midnight. |
| Premium       | Up to 10 requests per second                      | 1、Combined interfaces: 10 requests/second.<br />2、/batch-kline: 1 request/2 seconds.<br />3、Total: 600 requests/minute (10/second).<br />4、Daily limit: 864,000 requests; reset daily at midnight if exceeded. |
| Professional  | Up to 20 requests per second                      | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
| All HK Stocks | Up to 20 requests per second                      | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
| All CN Stocks | Up to 20 requests per second                      | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |



## API Endpoints

1. **US Stocks, Hong Kong Stocks, A Shares, Major Index Data API Endpoints:**

   - **Base Path:** `/quote-stock-b-api/depth-tick`
   - **Full URL:** `https://quote.alltick.io/quote-stock-b-api/depth-tick`

2. **Forex, Precious Metals, Cryptocurrencies, Commodities API Endpoints:**

   - **Base Path:** `/quote-b-api/depth-tick`

   - **Full URL:** `https://quote.alltick.io/quote-b-api/depth-tick`

     

## Request Examples

1. **Request Example for US Stocks, Hong Kong Stocks, A Shares, Major Index Data:**
   <br />When sending a query request, you must include the method name and token information. An example request is as follows:

   https://quote.alltick.io/quote-stock-b-api/depth-tick?token=your_token&query=queryData


3. **Request Example for Forex, Precious Metals, Cryptocurrencies, Commodities:**
   <br />When sending a query request, you must include the method name and token information. An example request is as follows:

   https://quote.alltick.io/quote-b-api/depth-tick?token=your_token&query=queryData


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
| » » code       | string | No       | Refer to the code list and select the code you want to query：[Click on the code list](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863)          |

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
