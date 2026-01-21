> [English](./static_query.md) | [中文](./static_query_cn.md)

## GET Resumption Information Query API

## GET /api/suspension

### Interface Description
This API provides queries for suspension and resumption information from major global exchanges (SSE, NYSE, NASDAQ). All APIs return data in JSON format, sorted in descending order by announcement time.

### Request Frequency

| Plan          | Individual request                   | Request multiple HTTP interfaces                                           |
| ------------- | ------------------------------------------------- | ------------------------------------------------------------ |
| Free          |Only 1 request per minute | 1、One request per second.<br />2、/batch-kline needs 10-second intervals.<br />3、Total of 10 requests per minute (every 6 seconds).<br />4、Max 14400 daily requests; excess resets at midnight. |
| Basic         | Only 1 request per minute                        | 1、One request per second.<br />2、/batch-kline: 1 request every 3 seconds.<br />3、Total of 60 requests per minute (1 request per second).<br />4、Max 86400 daily requests; excess resets at midnight. |
| Premium       | Only 1 request per minute                     | 1、Combined interfaces: 10 requests/second.<br />2、/batch-kline: 1 request/2 seconds.<br />3、Total: 600 requests/minute (10/second).<br />4、Daily limit: 864,000 requests; reset daily at midnight if exceeded. |
| Professional  |Only 1 request per minute                     | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
| All HK Stocks | Only 1 request per minute                    | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
| All CN Stocks | Only 1 request per minute                     | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
| All US Stocks | Only 1 request per minute                     | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |


### Interface Limitations
- 1、Please be sure to read:[HTTP Interface Limitations](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/http_interface/interface_limitation_cn.md)
- 2、Please be sure to read:[Error Code Descriptions](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/error_code_description_cn.md)

### Interface Address
#### 1、Query Suspension/Resumption Information of the Shanghai Stock Exchange (SSE):
- Base Path: /api/suspension/sse
- Full URL: https://quote.alltick.co/api/suspension/sse
  
#### 2、Query Suspension/Resumption Information of the New York Stock Exchange (NYSE):
- Base Path: /api/suspension/nyse
- Full URL: https://quote.alltick.co/api/suspension/nyse

#### 3、Query Suspension/Resumption Information of the Nasdaq Stock Exchange:
- Base Path: /api/suspension/nasdaq
- Full URL: https://quote.alltick.co/api/suspension/nasdaq


### Request Example

### 1、Retrieve the Shanghai Stock Exchange data API：

#### API Information
- **URL**: `/api/suspension/sse`
- **Method**: `GET`
- **Description**: Retrieve all suspension and resumption information from the Shanghai Stock Exchange (SSE).

### Request Parameters
| Field | Type | Required | Description |
|----|----|----|----|
| token | string | Yes | User subscription token |
| page | int | No | Page number |
| size | int | No | Page size |

### Response Example
```json
{
  "success": true,
  "timestamp": "2024-01-15T10:30:00",
  "totalCount": 125,
  "data": [
    {
      "symbol": "600000",
      "symbolName": "浦发银行",
      "haltReason": "重大事项停牌",
      "haltDate": "2024-01-15",
      "haltTime": "09:30:00",
      "haltPeriod": "全天停牌",
      "resumeDate": "2024-01-16",
      "resumeTime": "09:30:00",
      "publishDate": "2024-01-14 18:00:00"
    }
  ]
}
```

# Response Field Description

## Common Fields

| Field        | Type    | Required | Description                                   |
|---------------|---------|----------|----------------------------------------|
| » success     | boolean | Yes       | Whether the request was successful                          |
| » timestamp   | string  | Yes       | Response timestamp (format: yyyy-MM-dd'T'HH:mm:ss) |
| » totalCount  | integer | Yes       | Total number of records                             |
| » data        | array   | Yes      | List of suspension/resumption records                         |
| » totalPages  | integer | No       | Total number of pages (returned in paginated queries)           |
| » currentPage | integer | No       | Current page (returned in paginated queries)               |
| » currentSize | integer | No       | Number of records on the current page (returned in paginated queries)     |

---

## data（Object Fields）

Fields in each object:

| Field       | Type   | Nullable | Description      |
|--------------|--------|--------------|------------|
| » symbol     | string | No           | Stock symbol  |
| » symbolName | string | Yes           | Stock name   |
| » haltReason | string | Yes           | Reason for suspension   |
| » haltDate   | string | Yes           | Suspension date   |
| » haltTime   | string | Yes           | Suspension time   |
| » haltPeriod | string | Yes           | Suspension duration   |
| » resumeDate | string | Yes           | Resumption date   |
| » resumeTime | string | Yes           | Resumption time   |
| » publishDate| string | No           | Announcement time   |

---

## Example Request

curl -X GET "https://quote.alltick.co/api/suspension/sse?token=您的Token&page=1&size=10"

### 2、Obtain the NYSE data API：

#### API Information
- **URL**: `/api/suspension/nyse`
- **Method**: `GET`
- **Description**: Retrieve all suspension and resumption information from the New York Stock Exchange (NYSE).

### Request Parameters
| Field | Type | Required | Description |
|----|----|----|----|
| token | string | Yes | User subscription token |
| page | int | No | Page number |
| size | int | No | Page size |


### Response Example
```json
{
  "success": true,
  "timestamp": "2024-01-15T10:30:00",
  "totalCount": 89,
  "data": [
    {
      "symbol": "AAPL",
      "haltReason": "新闻待公布",
      "haltDate": "2024-01-15",
      "haltTime": "10:15:00",
      "haltDateTime": "2024-01-15 10:15:00",
      "resumeDate": "2024-01-15",
      "resumeTime": "11:00:00",
      "resumeDateTime": "2024-01-15 11:00:00",
      "sourceExchange": "NYSE"
      "publishDate": "2024-01-15 10:10:00
    }
  ]
}

```

# Response Field Description

## Common Fields

| Field        | Type    | Required | Description                                   |
|---------------|---------|----------|----------------------------------------|
| » success     | boolean | Yes       | Whether the request was successful                          |
| » timestamp   | string  | Yes       | Response timestamp (format: yyyy-MM-dd'T'HH:mm:ss) |
| » totalCount  | integer | Yes       | Total number of records                             |
| » data        | array   | Yes      | List of suspension/resumption records                         |
| » totalPages  | integer | No       | Total number of pages (returned in paginated queries)           |
| » currentPage | integer | No       | Current page (returned in paginated queries)               |
| » currentSize | integer | No       | Number of records on the current page (returned in paginated queries)     |


---

## data（Object Fields）

Fields in each object:

| Field       | Type   | Nullable | Description       |
|--------------|--------|--------------|------------|
| » symbol     | string | No           | Stock symbol   |
| » symbolName | string | Yes           | Stock name   |
| » haltReason | string | Yes           | Reason for suspension   |
| » haltTime   | string | Yes           | Suspension time   |
| » haltDateTime   | string | Yes           | Suspension date and time  |
| » resumeDate | string | Yes           | Resumption date   |
| » resumeTime | string | Yes           | Resumption time   |
| » resumeDateTime | string | Yes           | Resumption date and time   |
| » sourceExchange| string | Yes           | Exchange code   |
| » publishDate| string | No           | Announcement time   |

---

## Example Request

curl -X GET "<https://quote.alltick.co/api/suspension/nyse?token=您的Token&page=1&size=10>" -H "Accept: application/json"

### 3、 NASDAQ Suspension/Resumption Data API：

#### API Information
- **URL**: `/api/suspension/nasdaq`
- **Method**: `GET`
- **Description**  Retrieve all suspension and resumption information from the NASDAQ Stock Exchange.

### Request Parameters
| Field | Type | Required | Description |
|----|----|----|----|
| token | string | Yes | User subscription token |
| page | int | No | Page number |
| size | int | No | Page size |

### Response Example
```json
{
  "success": true,
  "timestamp": "2024-01-15T10:30:00",
  "totalCount": 156,
  "data": [
    {
      "symbol": "GOOGL",
      "haltDate": "2024-01-15",
      "haltTime": "13:45:00",
      "haltDateTime": "2024-01-15 13:45:00",
      "sourceExchange": "NASDAQ",
      "haltReason": "波动性暂停",
      "pauseThresholdPrice": "145.50",
      "resumeDate": "2024-01-15",
      "resumeTime": "14:00:00",
      "resumeDateTime": "2024-01-15 14:00:00",
      "publishDate": "2024-01-15 13:44:30"
    }
  ]
}

```

# Response Field Description

## Common Fields

| Field        | Type    | Required | Description                                   |
|---------------|---------|----------|----------------------------------------|
| » success     | boolean | Yes       | Whether the request was successful                          |
| » timestamp   | string  | Yes       | Response timestamp (format: yyyy-MM-dd'T'HH:mm:ss) |
| » totalCount  | integer | Yes       | Total number of records                             |
| » data        | array   | Yes      | List of suspension/resumption records                         |
| » totalPages  | integer | No       | Total number of pages (returned in paginated queries)           |
| » currentPage | integer | No       | Current page (returned in paginated queries)               |
| » currentSize | integer | No       | Number of records on the current page (returned in paginated queries)     |


---

## data（Object Fields）

Fields in each object：

| Field                | Type   | Nullable | Description         |
|-----------------------|--------|--------------|--------------|
| » symbol              | string | No           | Stock symbol     |
| » symbolName          | string | Yes           | Stock name     |
| » haltDate            | string | Yes           | Suspension date     |
| » haltTime            | string | Yes           | Suspension time     |
| » haltDateTime        | string | Yes           | Suspension date and time |
| » sourceExchange      | string | Yes           | Exchange code   |
| » haltReason          | string | Yes           | Reason for suspension     |
| » pauseThresholdPrice | string | Yes           | Pause threshold price |
| » resumeDate          | string | Yes           | Resumption date     |
| » resumeTime          | string | Yes           | Quote resumption time |
| » resumeDateTime      | string | Yes           | Trading resumption time |
| » publishDate         | string | No           | Announcement time     |

---

## Example Request

curl -X GET "<https://quote.alltick.co/api/suspension/nasdaq?token=您的Token&page=1&size=10>" -H "Accept: application/json"

# Error Response

All APIs return the following format when an error occurs:

```json
{
    "success": false,
    "error": "Error description"
}
```

#### HTTP Status Code: 500


## Error Response Fields

| Field  | Type    | Required | Description                       |
|---------|---------|----------|----------------------------|
| success | boolean | Yes       | Always （false） |
| error   | string  | Yes       | Error description               |

# Notes

1. Pagination is not supported; all APIs return the full dataset for the most recent one year.
2. Data is sorted by announcement time in descending order (latest first).
3. Time format details:
       timestamp: ISO format (yyyy-MM-dd'T'HH:mm:ss)
       Other time fields: yyyy-MM-dd HH:mm:ss
4. It is recommended to set an appropriate timeout, as large data volumes may require longer response times.
5. Field nullability:
       "No": The field always has a value and will never be null.
       "Yes": The field may be null or an empty string; callers should handle null checks accordingly.
