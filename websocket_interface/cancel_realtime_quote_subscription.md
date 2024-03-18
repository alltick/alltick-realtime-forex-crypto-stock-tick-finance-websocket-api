> [English](./cancel_realtime_quote_subscription.md) | [中文](./cancel_realtime_quote_subscription_cn.md)

# Interface Description

# Request - Protocol Number: 22006
## Data Format: JSON
## Data Structure
### Definition of data
| Field       | Name         | Type   | Required | Description                                                  |
| ----------- | ------------ | ------ | -------- | ------------------------------------------------------------ |
| cancel_type | Cancel Type  | uint32 | Yes      | 0: Cancel all quote subscriptions, 1: Cancel depth quote subscriptions, 2: Cancel transaction quote subscriptions |
## Request Example
```json
{
    "cmd_id":22006,
    "seq_id":123,
    "trace":"asdfsdfa",
    "data":{
        "cancel_type": 1,
    }
}
```

# Response - Protocol Number: 22007
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
    "cmd_id":22007,
    "seq_id":123,
    "trace":"asdfsdfa",
    "data":{
    }    
}

```