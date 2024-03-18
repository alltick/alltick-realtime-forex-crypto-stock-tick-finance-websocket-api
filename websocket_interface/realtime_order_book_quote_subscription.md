> [English](./realtime_order_book_quote_subscription.md) | [中文](./realtime_order_book_quote_subscription_cn.md)

# Interface Description

This interface feature is that for each WebSocket connection, every time this request is sent, the backend will default to overwrite the previous subscription request. After successful subscription, data will be pushed.

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
| code         | Code       | string | Yes      | Specific content, please refer to the code list |
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
| volume  | Bid Volume       | string |             |
### asks definition
| Field   | Name             | Type   | Description |
| ------- | ---------------- | ------ | ----------- |
| price   | Ask Price        | string |             |
| volume  | Ask Volume       | string |             |
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