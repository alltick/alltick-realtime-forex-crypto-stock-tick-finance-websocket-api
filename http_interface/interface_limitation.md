> [English](./interface_limitation.md) | [中文](./interface_limitation_cn.md)

# HTTP interface restrictions

## **1.** Frequency Limits

| Plan         | Individual request       | Request multiple HTTP interfaces     |
| ------------------------ | ------------------------------------------------------------ | ------------------------------------------------------------ |
| Free          | **/kline API**：1 request per 10 seconds<br /> **/batch-kline API**：1 request per 10 seconds<br /> **/depth-tick API**：1 request per second<br /> **/trade-tick API**：1 request per second<br /> **/static_info API**：1 request per 10 seconds | 1、One request per second.<br />2、/batch-kline needs 10-second intervals.<br />3、Total of 10 requests per minute (every 6 seconds).<br />4、Max 14400 daily requests; excess resets at midnight. |
| Basic         | **/kline API**：1 request per second<br /> **/batch-kline API**：1 request every 3 seconds<br /> **/depth-tick API**：1 request per second<br /> **/trade-tick API**：1 request per second<br /> **/static_info API**：1 request per second | 1、One request per second.<br />2、/batch-kline: 1 request every 3 seconds.<br />3、Total of 60 requests per minute (1 request per second).<br />4、Max 86400 daily requests; excess resets at midnight. |
|Premium       | **/kline API**：Max 10 requests per second<br /> **/batch-kline API**：1 request every 2 seconds<br /> **/depth-tick API**：Max 10 requests per second<br /> **/trade-tick API**：Max 10 requests per second<br /> **/static_info API**：Max 10 requests per second | 1、Combined interfaces: 10 requests/second.<br />2、/batch-kline: 1 request/2 seconds.<br />3、Total: 600 requests/minute (10/second).<br />4、Daily limit: 864,000 requests; reset daily at midnight if exceeded. |
| Professional  | **/kline API**：Max 20 requests per second<br /> **/batch-kline API**：1 request per second<br /> **/depth-tick API**：Max 20 requests per second<br /> **/trade-tick API**：Max 20 requests per second<br /> **/static_info API**：Max 20 requests per second | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
| All HK Stocks | **/kline API**：Max 20 requests per second<br /> **/batch-kline API**：1 request per second <br />**/depth-tick API**：Max 20 requests per second<br /> **/trade-tick API**：Max 20 requests per second<br /> **/static_info API**：Max 20 requests per second | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |
|All CN Stocks | **/kline API**：Max 20 requests per second<br /> **/batch-kline API**：1 request per second<br /> **/depth-tick API**：Max 20 requests per second<br /> **/trade-tick API**：Max 20 requests per second<br /> **/static_info API**：Max 20 requests per second | 1、Combined interfaces: 20 requests/second.<br />2、/batch-kline: 1 request/second interval.<br />3、Total: 1200 requests/minute (20/second).<br />4、Daily limit: 1,728,000 requests; reset daily at midnight if exceeded. |

## **2.** IP Limits
- Requests are limited based on the token, not the IP address.
- Example:：The basic plan allows **1 request per second**.If a token requests the `/kline` API at **14:03:01** and the `/trade-tick` API within the same second, both will be processed.However, if the token sends **two requests** to `/kline` at **14:03:01**, the first will succeed, but the second will be rejected.

## **3.** K-Line Data Query Limits

**`/kline`** **API**:
 - Queries must specify **one product code** per request.
 - A maximum of **500 K-line records** can be returned per request.
 - If more than 500 records are requested, only the first 500 will be returned.
   
**`/batch-kline`** **API**:
 - Supports multiple product codes per request.
 - The number of codes allowed depends on the purchased plan.
 - Each request returns up to **2 K-line records per code**.
 - If more than 2 records are requested, only the first 2 will be returned.

| Plan                   | Max code requests for /batch-kline interface.                                                        |
| ------------------------ | ------------------------------------------------------------ |
| Free          | Each request can fetch up to 5 data sets, calculated as 5=product code count * candlestick types. Candlestick types include 1-minute, 15-minute, etc. |
| Basic         | Each request can retrieve a maximum of 100 data sets, calculated as 100 = product code count * candlestick types. |
| Premium       | Each request can retrieve a maximum of 200 data sets, calculated as 200 = product code count * candlestick types. |
| Professional  | Each request can retrieve a maximum of 500 data sets, calculated as 500 = product code count * candlestick types. |
| All HK Stocks | Each request can fetch up to 500 data sets, calculated as 500 = product codes * candlestick types. |
| All CN Stocks | Each request can fetch a maximum of 500 data sets, where 500 = number of product codes * types of K-line patterns. |


## **4.** Latest Trade Price Query Limits
**`/trade-tick`** **API**:
 - Allows querying the latest trade prices for multiple product codes in a single request.
 - The number of product codes that can be queried at once depends on the purchased plan (see the table below).
 - If the request exceeds the allowed number of product codes, the system will only process and return results for the first **N** codes within the limit.

| Plan                     | Maximum requested code quantity                                                         |
| ------------------------ | ------------------------------------------------------------ |
| Free          | Each request can fetch up to 5 codes.                        |
| Basic         | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |
| Premium       | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |
| Professional  | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |
| All HK Stocks | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |
| All CN Stocks | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |



## **5.** Order Book Query Limits

**`/depth-tick`** **API**:
 - Supports multiple product codes per request.
 - The number of codes allowed depends on the purchased plan.
 - If more codes are requested than allowed, only the first **N** will be processed.

| Text                     | Text                                                         |
| ------------------------ | ------------------------------------------------------------ |
| Free          | Each request can fetch up to 5 codes.                        |
| Basic         | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |
| Premium       | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |
| Professional  | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |
| All HK Stocks | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |
| All CN Stocks | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |


## **6.** Basic Information Query Limits

**`/static_info`** **API**:
 - Supports multiple product codes per request.
 - The number of codes allowed depends on the purchased plan.
 - If more codes are requested than allowed, only the first **N** will be processed.


| Plan                     | Maximum requested code quantity                                                       |
| ------------------------ | ------------------------------------------------------------ |
| Free          | Each request can fetch up to 5 codes.                        |
| Basic         | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |
| Premium       | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |
| Professional  | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |
| All HK Stocks | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |
| All CN Stocks | Due to the GET request URL length limit, it is recommended to request a maximum of 50 codes at a time. |


#### Important Notes

- Plan your API requests efficiently to avoid service interruptions.
- These limits ensure fair resource distribution and system stability.
- For further assistance, please contact customer support.


### Official Website

Official website: https://alltick.co/
