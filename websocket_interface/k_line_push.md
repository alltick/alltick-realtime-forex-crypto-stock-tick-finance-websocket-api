> [English](./k_line_push.md) | [中文](./k_line_push_cn.md)

# K-line push (not supported)

# K-line Push Explanation

Alltick's WebSocket interface does not support K-line data push. Both historical and real-time K-lines can only be accessed through the HTTP interface. Recommended implementation methods are as follows:

**Implementation Suggestions (for reference):**

**1、Periodic K-line Retrieval:** To ensure quick updates, consider purchasing a high-frequency request plan.

**2、Combine HTTP Interfaces:** It is recommended to use both /kline and /batch-kline interfaces as follows:

- First, use the /kline interface to poll and store historical data in a local database. Subsequent historical data can be retrieved directly from the database without additional requests.

- Then, continuously use the /batch-kline interface to request the latest two K-lines for multiple products and update the database.

This method allows for quick updates of the latest K-lines while avoiding limitations from frequent historical requests.

# Price Change Calculation

**Alltick API does not provide price change or 24-hour price change fields.** Users can calculate price changes using Alltick data.

**1、Daily Price Change Calculation：**

**Method 1:** Use the HTTP API to get the daily K-line closing price for today and the previous day.

**Formula:** Price Change (%) = (Today's Closing Price - Previous Day's Closing Price) / Previous Day's Closing Price * 100%

**Method 2:** Use the WebSocket API to get the latest price and the HTTP API to fetch the previous day's closing price.

**Formula:** Price Change (%) = (Latest Price - Previous Day's Closing Price) / Previous Day's Closing Price * 100%

**2、24-Hour Price Change Calculation：**

Use the WebSocket trade price API (Request Protocol: 22004) to receive real-time tick data.

To calculate, store the latest price from 24 hours ago and use the following formula:

Formula: 24H Price Change (%) = (Latest Price - Price 24 Hours Ago) / Price 24 Hours Ago * 100%
