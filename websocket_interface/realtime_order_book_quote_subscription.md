> [English](./realtime_order_book_quote_subscription.md) | [中文](./realtime_order_book_quote_subscription_cn.md)

# Subscription real-time quote data interface instructions

## Interface Description
This interface supports subscribing to the latest market depth (real-time tick-by-tick, Order Book) data for products, but does not support historical market depth or historical tick data.
<br />**Interface Features:** For each WebSocket connection, sending this request will overwrite the previous subscription by default. For example, if you initially subscribed to products A, B, and C and want to add E, F, and G, you must resend A, B, C, E, F, and G. After successful subscription, data will be pushed.

**Note:**
<br />1、After a successful subscription, avoid frequent requests. Send a heartbeat every 10 seconds; if no heartbeat is received in 30 seconds, the WebSocket will disconnect.
<br />2、Implement automatic reconnection logic to handle network disconnections.
<br />3、Maximum market depth limits for each product:
<br />- 3.1  Inactive products may have less depth than listed.
<br />- 3.2 One side of the depth may be empty, such as during limit up or down for stocks.

|                    | FX、Metals      | Cryptocurrency  | HK Stocks        | CN Stocks       |
| ---------------------- | --------------- | --------------- | ---------------- | --------------- |
| Order Book Description | Maximum 1 gears<br />(Only Price, No Volume) | Maximum 5 gears | Maximum 10 gears | Maximum 5 gears |


## Interface Limitations
- 1、Please be sure to read: [ Websocket Interface Limitations ](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/websocket_interface/interface_limitation.md).
- 2、Please be sure to read: [ Error Code Descriptions ](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/error_code_description.md).

## API Endpoints
**1、Stock Market Data API for US, HK, A-shares, and Index:**
<br />Base Path: /quote-stock-b-ws-api
<br />Full URL: wss://quote.alltick.co/quote-stock-b-ws-api 

<br />**2、API for Forex, Precious Metals, Cryptocurrencies, and Commodities:**
<br />Base Path: /quote-b-ws-api
<br />Full URL: wss://quote.alltick.co/quote-b-ws-api

## Request Examples
**1、Request Example for US, HK, A-shares, and Index Data:**
<br />Each time you establish a connection, you must append your authentication token to the URL as follows:

<br />wss://quote.alltick.co/quote-stock-b-ws-api?token=your_token

<br />After a successful connection, you can subscribe to specific stock market data as needed. Please refer to the documentation below for detailed calling methods.

**2、Request Example for Forex, Precious Metals, Cryptocurrencies, and Commodities:**
<br />Each time you establish a connection, you must append your authentication token to the URL as follows:

<br />wss://quote.alltick.co/quote-b-ws-api?token=your_token

<br />After a successful connection, you can subscribe to specific forex, cryptocurrency, precious metals, and commodities data as needed. Please refer to the documentation below for detailed calling methods.


# Request - Protocol Number: 22002
## Data Format: JSON
## Data Structure
### Definition of data
| Field        | Name       | Type   | Required | Description                |
| ------------ | ---------- | ------ | -------- | --------------------------|
| symbol_list  | Product List | array | Yes      | Specific format see below symbol definition |
### Symbol Definition
| Field        | Name       | Type   | Required | Description                |
| ------------ | ---------- | ------ | -------- | --------------------------|
| code         | Code       | string | Yes      | Refer to the code list and select the code you want to query：[Click on the code list](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863)  |
| depth_level  | Depth Level| uint32 | No       | If there is no depth_level field, the backend will only provide one level of quotes. If the requested level is greater than the actual quote level, or if there is no depth_level field, the backend will provide as many levels as there are actual quotes |
## Request Example
```json
{
    "cmd_id":22002,
    "seq_id":123,
    "trace":"asdfsdfa",
    "data":{
        "symbol_list": [
            {
		"code": "HK-1288",
                "depth_level": 5,
            },
	],
    }
}
```
# Response - Protocol Number: 22003
## Data Format: JSON
## Data Structure
### Definition of data
| Field | Name | Type | Description |
| --- | --- | --- | --- |
|  |  |  |  |


## Response Example
```json
{
    "ret":200,
    "msg":"ok",
    "cmd_id":22003,
    "seq_id":123,
    "trace":"asdfsdfa",
    "data":{
    }    
}
```
# Push - Protocol Number: 22999
## Data Format: JSON
## Data Structure
### Definition of data
| Field      | Name         | Type   | Description                |
| ---------- | ------------ | ------ | -------------------------- |
| code       | Code         | string | Specific content, refer to the code list |
| seq        | Quote Number | string |                             |
| tick_time  | Quote Timestamp | string | In milliseconds          |
| bids       | Bid Depth    | array  | See below for bids definition |
| asks       | Ask Depth    | array  | See below for asks definition |
### bids definition
| Field   | Name             | Type   | Description |
| ------- | ---------------- | ------ | ----------- |
| price   | Bid Price        | string |             |
| volume  | Bid Volume       | string |1、Forex, precious metals, and CFD indices do not provide volume.<br />2、Stocks and cryptocurrency data provide volume.|
### asks definition
| Field   | Name             | Type   | Description |
| ------- | ---------------- | ------ | ----------- |
| price   | Ask Price        | string |             |
| volume  | Ask Volume       | string | 1、Forex, precious metals, and CFD indices do not provide volume.<br />2、Stocks and cryptocurrency data provide volume. |
## Response Example
```json
{
    "cmd_id":22999,
    "data":{
	"code": "HK-1288",
        "seq": "1605509068000001",
        "tick_time": "1605509068",
        "bids": [
            {
                "price": "9.12",
                "volume": "9.12",
            },
        ],
        "asks": [
            {
                "price": "147.12",
                "volume": "147.12",
            },
        ],
    }
}
```
