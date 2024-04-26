> [English](./realtime_transaction_quote_subscription.md) | [中文](./realtime_transaction_quote_subscription_cn.md)

# 订阅实时成交报价数据接口说明

该接口特性为对于每一个websocket连接，每发送一次该请求，后台会默认覆盖上一次订阅请求。订阅成功后会进行推送数据。
# 请求-协议号：22004
## 数据格式:json
## 数据结构
### data定义
| 字段        | 名称     | 类型  | 必填项 | 说明                     |
| ----------- | -------- | ----- | ------ | ------------------------ |
| symbol_list | 产品列表 | array | 是     | 具体格式见下面symbol定义 |
### symbol定义
| 字段 | 名称 | 类型   | 必填项 | 说明                     |
| ---- | ---- | ------ | ------ | ------------------------ |
| code | 代码 | string | 是     | 具体内容，请查阅code列表 |
## 请求示例
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
# 应答-协议号：22005
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
    "cmd_id":22005,
    "seq_id":106254124,
    "trace":"3baaa938-f92c-4a74-a228-fd49d5e2",
    "data":{
    }    
}
```
# 推送-协议号：22998
## 数据格式:json
## 数据结构
### data定义
| 字段            | 名称       | 类型   | 说明                       |
| --------------- | ---------- | ------ | -------------------------- |
| code            | 代码       | string | 具体内容，请查阅code列表   |
| seq             | 报价序号   | string |                            |
| tick_time       | 报价时间戳 | string | 单位毫秒                   |
| price           | 成交价     | string |                            |
| volume          | 成交量     | string |                            |
| turnover        | 成交额     | string |                            |
| trade_direction | 成交方向   | uint32 | 0为默认值，1为BUY，2为SELL |
## 应答示例
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
