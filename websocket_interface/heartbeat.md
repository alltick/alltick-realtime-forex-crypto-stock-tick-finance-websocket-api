> [English](./heartbeat.md) | [中文](./heartbeat_cn.md)

# Interface Description

Requesters are required to send a heartbeat request every 10 seconds. If no heartbeat request is received within 30 seconds, the requester's WebSocket connection will be considered timed out and disconnected.

# Request - Protocol Number: 22000
## Data Format: JSON
## Data Structure
### Definition of data
| Field | Name | Type | Required | Description |
| --- | --- |  ---  | --- | --- |
|  |  |    |  | |
## Request Example
```json
{
    "cmd_id":22000,
    "seq_id":123,
    "trace":"asdfsdfa",
    "data":{
    }
}
```
# Response - Protocol Number: 22001
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
    "cmd_id":22001,
    "seq_id":123,
    "trace":"asdfsdfa",
    "data":{
    }
}

```