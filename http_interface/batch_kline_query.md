> [English](./batch_kline_query.md) | [中文](./batch_kline_query_cn.md)

## GET Batch Code Latest K-Line Query

GET /batch-kline

> Please refer to the complete URL in [API Address Description](./api_address_description.md)

### Batch Code Latest K-Line Query functionality. Due to the large number of batch query parameters, they are placed in the body, with only the token field parameter remaining in the URL parameters.

<u></u>[Get the reference article for the method of using body to pass parameters in a request](https://blog.csdn.net/fz250052/article/details/103578855)

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
| »»» adjust_type | body     | integer  | Yes      | Adjustment type, only effective for stock type codes, e.g., 0: ex-right, 1: pre-adjustment |


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
