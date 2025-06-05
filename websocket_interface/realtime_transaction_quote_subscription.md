> [English](./realtime_transaction_quote_subscription.md) | [中文](./realtime_transaction_quote_subscription_cn.md)

# Subscription Real-time Transaction Quote Data Interface Instructions

## Interface Description
This API supports batch subscription to real-time trade prices (tick-by-tick data) but does not provide historical trade prices.

Each WebSocket connection allows one active subscription at a time.
<br />Sending a new subscription request overwrites the previous one.
<br />Example: If you initially subscribe to A, B, C and want to add E, F, G, you must resend A, B, C, E, F, G in a single request. Once subscribed, real-time data will be pushed automatically.

**Important Notes：**
<br />1、Do not repeatedly send subscription requests.
<br />After a successful subscription, send a heartbeat every 10 seconds.
<br />If no heartbeat is received for 30 seconds, the server will assume a timeout and disconnect the WebSocket.
<br />2、Implement automatic reconnection.
<br />To handle network disconnections, clients should implement an auto-reconnect mechanism.

## Interface Limitations
- 1、Please be sure to read: [ Websocket Interface Limitations ](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/websocket_interface/interface_limitation.md).
- 2、Please be sure to read: [ Error Code Descriptions ](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/error_code_description.md).

## API Endpoints
**1、Stock Market Data API for US, HK, A-shares, and Index:**
<br />Base Path: /quote-stock-b-ws-api
<br />Full URL: wss://quote.alltick.io/quote-stock-b-ws-api 

<br />**2、API for Forex, Precious Metals, Cryptocurrencies, and Commodities:**
<br />Base Path: /quote-b-ws-api
<br />Full URL: wss://quote.alltick.io/quote-b-ws-api

## Request Examples
**1、Request Example for US, HK, A-shares, and Index Data:**
<br />Each time you establish a connection, you must append your authentication token to the URL as follows:

<br />wss://quote.alltick.io/quote-stock-b-ws-api?token=your_token

<br />After a successful connection, you can subscribe to specific stock market data as needed. Please refer to the documentation below for detailed calling methods.

**2、Request Example for Forex, Precious Metals, Cryptocurrencies, and Commodities:**
<br />Each time you establish a connection, you must append your authentication token to the URL as follows:

<br />wss://quote.alltick.io/quote-b-ws-api?token=your_token

<br />After a successful connection, you can subscribe to specific forex, cryptocurrency, precious metals, and commodities data as needed. Please refer to the documentation below for detailed calling methods.


# Request - Protocol Number: 22004
## Data Format: JSON
## Data Structure
### Definition of data
| Field        | Name       | Type   | Required | Description                |
| ------------ | ---------- | ------ | -------- | --------------------------|
| symbol_list  | Product List | array | Yes      | Specific format see below symbol definition |
### Symbol Definition
| Field | Name | Type   | Required | Description                |
| ---- | ---- | ------ | -------- | --------------------------|
| code | Code | string | Yes      | Refer to the code list and select the code you want to query：[Click on the code list](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863)   |
## Request Example
```json
{
    "cmd_id":22004,
    "seq_id":106254124,
    "trace":"3baaa938-f92c-4a74-a228-fd49d5e2",
    "data":{
        "symbol_list": [
            {
				"code": "1288.HK"
            },{
				"code": "AAPL.US"
            },
	],
    }
}
```
# Response - Protocol Number: 22005
## Data Format: JSON
## Data Structure
### Definition of data
| Field | Name | Type | Description |
| --- | --- |  ---  | --- |
|  |  |    |  |
## Response Example
```json
{
    "ret":200,
    "msg":"ok",
    "cmd_id":22005,
    "seq_id":106254124,
    "trace":"3baaa938-f92c-4a74-a228-fd49d5e2",
    "data":{
    }    
}
```
# Push - Protocol Number: 22998
## Data Format: JSON
## Data Structure
### Definition of data
| Field            | Name          | Type   | Description                 |
| ---------------- | ------------- | ------ | --------------------------- |
| code             | Code          | string | Specific content, refer to the code list |
| seq              | Quote Number  | string |                             |
| tick_time        | Quote Timestamp | string | In milliseconds             |
| price            | Transaction Price | string |    Last Price                       |
| volume           | Transaction Volume | string |   Last Trade Volume                   |
| turnover         | Transaction Turnover | string |  Turnover:<br/>1、For forex, precious metals, and energy, turnover is not provided. You can calculate it using the formula: turnover = price * volume.<br/>2、For stocks and cryptocurrencies, turnover is returned normally.                      |
| trade_direction  | Transaction Direction | uint32 | 0 as default, 1 for BUY, 2 for SELL |
## Response Example
```json
{
    "cmd_id":22998,
    "data":{
	"code": "1288.HK",
        "seq": "1605509068000001",
        "tick_time": "1605509068",
        "price": "651.12",
        "volume": "300",
        "turnover": "12345.6",
        "trade_direction": 1,
    }
}
```
