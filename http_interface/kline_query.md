> [English](./kline_query.md) | [中文](./kline_query_cn.md)

## GET K-Line Query

GET /kline
> Please refer to the complete URL in [API Address Description](./api_address_description.md)

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

