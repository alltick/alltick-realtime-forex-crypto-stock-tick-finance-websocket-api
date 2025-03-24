> [English](./price_changes_closure_holidays_delistings.md) | [中文](./price_changes_closure_holidays_delistings_cn.md)

# Price Change Calculation

**Alltick API does not provide price change or 24-hour price change fields.** Users can calculate price changes using Alltick data.

**1、Daily Price Change Calculation**

Method 1: Use the HTTP API to get the daily K-line closing price for today and the previous day：

Formula:
Price Change (%) = (Today's Closing Price - Previous Day's Closing Price) / Previous Day's Closing Price * 100%

Method 2: Use the WebSocket API to get the latest price and the HTTP API to retrieve the previous day's closing price for the daily candlestick chart. The calculation formula is as follows:

Formula:
Price Change (%) = (Latest Price - Previous Day's Closing Price) / Previous Day's Closing Price * 100%

**2、24-Hour Price Change Calculation**

Use the WebSocket trade price API (Request Protocol: 22004) to receive real-time tick data.

To calculate, store the latest price from 24 hours ago and use the following formula:

Formula:
24H Price Change (%) = (Latest Price - Price 24 Hours Ago) / Price 24 Hours Ago * 100%

# Market Closure and Trading Hours
Alltick does not provide an interface for market closure or trading hours. Customers can view the fixed trading hours for various products in the [Product List](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863).

# Holiday Notice
Alltick does not provide a holiday interface. Holiday market closure notifications will be posted in advance on our Telegram channel. Please refer to the Telegram channel for specific product information regarding market closures. Stay updated by following our channel:

Chinese Channel：[Telegram Channel](https://t.me/alltick_cn)

English Channel：[Telegram Channel](https://t.me/alltick_en)

# Explanation of Price Limits for Stocks
**Alltick does not provide an API to determine stock limit-up or limit-down.** Users can determine this using the depth market data API:

Depth Market Data Judgment：

When subscribing to the depth market data API:

If only one side (bid or ask) has data, and the other side's price and volume are both zero, the stock is at its limit-up or limit-down.

**Judgment Rules:**

**Limit-Up**: Only the bid side has data, while the ask price and volume are zero.

**Limit-Down**: Only the ask side has data, while the bid price and volume are zero.

Below is a sample screenshot of the data returned:

<img width="784" alt="image" src="https://github.com/user-attachments/assets/d8831632-cd0d-4704-8504-fb7623f758fe" />

# Explanation of Stock Delisting
Alltick does not provide an interface for delisting judgment. Customers can determine if a stock is delisted using the following method:

**Judgment Method:** When subscribing to the depth market data interface, if both the bid and ask sides' prices and volumes return as 0, the stock is considered delisted.

Below is a sample screenshot of the data returned:
<img width="840" alt="image" src="https://github.com/user-attachments/assets/5c044dd3-5a7b-401c-a8a0-1a947eceb8d0" />

# New Stock Listing Notice
Alltick does not provide an interface for determining new stock listings. We regularly update the [Product List](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863) to reflect newly listed stocks and remove delisted stocks.

Click the link to access the product list:

[Product List](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863)


