> [English](./realtime_transaction_quote_subscription.md) | [中文](./realtime_transaction_quote_subscription_cn.md)

# Interface Description

This interface feature is that for each WebSocket connection, every time this request is sent, the backend will default to overwrite the previous subscription request. After successful subscription, data will be pushed.

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
| code | Code | string | Yes      | Specific content, refer to the code list |
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
| price            | Transaction Price | string |                           |
| volume           | Transaction Volume | string |                           |
| turnover         | Transaction Turnover | string |                        |
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