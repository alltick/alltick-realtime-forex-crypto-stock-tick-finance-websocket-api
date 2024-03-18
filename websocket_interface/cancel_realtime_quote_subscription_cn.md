> [English](./cancel_realtime_quote_subscription.md) | [中文](./cancel_realtime_quote_subscription_cn.md)

# 接口说明

# 请求-协议号：22006
## 数据格式:json
## 数据结构
### data定义
| 字段        | 名称     | 类型   | 必填项 | 说明                                                         |
| ----------- | -------- | ------ | ------ | ------------------------------------------------------------ |
| cancel_type | 取消类型 | uint32 | 是     | 0：取消所有报价订阅，1：取消盘口报价订阅，2：取消成交报价订阅 |
## 请求示例
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
# 应答-协议号：22007
## 数据格式:json
## 数据结构
### data定义
| 字段 | 名称 | 类型 | 说明 |
| --- | --- |  ---  | --- |
|  |  |    |  |
## 应答示例
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