> [English](./realtime_order_book_quote_subscription.md) | [中文](./realtime_order_book_quote_subscription_cn.md)

# 最新盘口(Order Book)订阅

## 接口说明
该接口支持订阅产品的最新盘口(实时逐笔深度、Order Book)数据，不支持历史盘口和历史逐笔tick数据。
<br />该接口特性：对于每一个websocket连接，每发送一次该请求，后台会默认覆盖上一次订阅请求（例如，如果您最初订阅了A、B、C这三只产品，想要追加订阅E、F、G，则需要重新发送一次A、B、C、E、F、G），订阅成功后会进行推送数据。

注意：
<br />1、订阅一次成功后，不需要再频繁的发起订阅请求，要求每10秒发送一次心跳，接口就会实时推送数据，在30秒内如果没有收到心跳请求，就会认为超时，断开请求者的websocket连接
<br />2、接入时，客户可增加断开自动重连的逻辑，确保因网络等原因断开可自动重连
<br />3、以下是每类产品最大的盘口深度：
<br />3.1 不活跃的产品存在小于下面列的最大档的情况，属于正常情况
<br />3.2 存在单边深度是空的情况，例如股票涨停跌停时，单边盘口可能是空的
|       | 外汇、贵金属、原油、CFD指数 | 加密货币 | 港股     | 美股    | 沪深A股 |
| -------- | ------------------ | -------- | -------- | ------- | ------- |
| 深度说明 | 最大1档(只有委托价，没有量)| 最大5档  | 最大10档 | 最大1档 | 最大5档 |

## 接口限制
- 1、请务必阅读：[Websocket接口限制说明](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/websocket_interface/interface_limitation_cn.md)
- 2、请务必阅读：[错误码说明](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/error_code_description_cn.md)

## 接口地址

**1、美股、港股、A股、大盘数据接口地址：**

基本路径: /quote-stock-b-ws-api

完整URL: wss://quote.alltick.io/quote-stock-b-ws-api

**2、外汇、贵金属、加密货币、原油、CFD指数、商品接口地址：**

基本路径: /quote-b-ws-api

完整URL: wss://quote.alltick.io/quote-b-ws-api

## 请求示例

**1、美股、港股、A股、大盘数据请求示例：**

每次建立连接时，必须在URL中附加您的认证token，如下所示：

wss://quote.alltick.io/quote-stock-b-ws-api?token=您的token

连接成功后，您可以根据需要订阅特定的股票市场数据。详细的调用方法请参考下面的文档说明。

**2、外汇、贵金属、加密货币、原油、CFD指数、商品请求示例：**

每次建立连接时，必须在URL中附加您的认证token，如下所示：

wss://quote.alltick.io/quote-b-ws-api?token=您的token

连接成功后，您可以根据需要订阅特定的外汇、加密货币、贵金属、商品数据。详细的调用方法请参考下面的文档说明。

# 请求-协议号：22002
## 数据格式:json
## 数据结构
### data定义
| 字段        | 名称     | 类型  | 必填项 | 说明                     |
| ----------- | -------- | ----- | ------ | ------------------------ |
| symbol_list | 产品列表 | array | 是     | 具体格式见下面symbol定义 |
### symbol定义
| 字段        | 名称     | 类型   | 必填项 | 说明                                                         |
| ----------- | -------- | ------ | ------ | ------------------------------------------------------------ |
| code        | 代码     | string | 是     | 具体内容，请查阅code列表 ：[点击code列表](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863)                                    |
| depth_level | 深度层级 | uint32 | 否     | 如果没有depth_level字段时，后台只会提供一层的报价，请求的层级大于实际报价层级，或者如果没有depth_level字段时，则后台按实际报价有多少层给多少层 |
## 请求示例
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
# 应答-协议号：22003
## 数据格式:json
## 数据结构
### data定义
| 字段 | 名称 | 类型 | 说明 |
| --- | --- | --- | --- |
|  |  |  |  |


## 应答示例
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
# 推送-协议号：22999
## 数据格式:json
## 数据结构
### data定义
| 字段      | 名称       | 类型   | 说明                     |
| --------- | ---------- | ------ | ------------------------ |
| code      | 代码       | string | 具体内容，请查阅code列表 |
| seq       | 报价序号   | string |                          |
| tick_time | 报价时间戳 | string | 单位毫秒                 |
| bids      | bid深度    | array  | 见下面bids定义           |
| asks      | ask深度    | array  | 见下面asks定义           |
### bids定义
| 字段   | 名称             | 类型   | 说明 |
| ------ | ---------------- | ------ | ---- |
| price  | 买一价，买盘价格 | string |      |
| volume | 买一量，买盘量   | string |1、外汇、贵金属、CFD指数不提供volume<br />2、股票，加密货币数据均提供volume    |
### asks定义
| 字段   | 名称             | 类型   | 说明 |
| ------ | ---------------- | ------ | ---- |
| price  | 卖一价，买盘价格 | string |      |
| volume | 卖一量，买盘量   | string |1、外汇、贵金属、CFD指数不提供volume<br />2、股票，加密货币数据均提供volume    |
## 应答示例
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
