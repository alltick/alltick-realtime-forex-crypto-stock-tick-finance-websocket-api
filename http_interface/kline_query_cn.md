> [English](./kline_query.md) | [中文](./kline_query_cn.md)

## GET 单产品历史K线查询（最高、最低、开盘、收盘价）

## GET /kline

###  接口说明
该接口可用来查询历史k线，但每次只能查询一个产品，建议将查询到的历史K线缓存本地数据库。
<br />使用HTTP接口获取K线的客户，建议将/kline和/batch-kline这2个接口结合使用,步骤如下：
<br />1、首先，通过 /kline 接口轮询请求历史数据并存储到本地数据库，后续历史数据可直接从客户的数据库获取，无需再通过接口请求。
<br />2、然后，后续持续使用 /batch-kline 接口批量请求多个产品的最新2根K线，并将数据更新到数据库。
<br />这种方式能够快速更新最新的K线，同时避免频繁请求历史K线造成频率受到限制。

### 请求频率

| 计划     | 单独请求              | 同时请求多个http接口                                         |
| :------- | :-------------------- | :----------------------------------------------------------- |
| 免费     | 每10秒，只能1次请求   | 1、同1秒只能请求1个接口<br />2、多个接口请求时，需注意/batch-kline接口需间隔10秒<br /> 3、所有接口相加，1分钟最大请求10次(6秒1次) <br /> 4、每天总共最大可请求14400次，超过则第二天凌晨恢复使用|
| 基础     | 每1秒，只能1次请求    | 1、同1秒只能请求1个接口<br />2、多个接口请求时，需注意/batch-kline接口需间隔3秒<br /> 3、所有接口相加，1分钟最大请求60次(1秒1次) <br />4、每天总共最大可请求86400次，超过则第二天凌晨恢复使用|
| 高级     | 每1秒，最大可10次请求 | 1、所以接口相加，每1秒可请求10次<br />2、多个接口请求时，需注意/batch-kline接口需间隔2秒<br /> 3、所有接口相加，1分钟最大请求600次(1秒10次) <br />4、每天总共最大可请求864000次，超过则第二天凌晨恢复使用|
| 专业     | 每1秒，最大可20次请求 | 1、所以接口相加，每1秒可请求20次<br />2、多个接口请求时，需注意/batch-kline接口需间隔1秒<br /> 3、所有接口相加，1分钟最大请求1200次(1秒20次) <br />4、每天总共最大可请求1728000次，超过则第二天凌晨恢复使用|
| 全部港股 | 每1秒，最大可20次请求 | 1、所以接口相加，每1秒可请求20次<br />2、多个接口请求时，需注意/batch-kline接口需间隔1秒<br /> 3、所有接口相加，1分钟最大请求1200次(1秒20次) <br />4、每天总共最大可请求1728000次，超过则第二天凌晨恢复使用|
| 全部A股  | 每1秒，最大可20次请求 | 1、所以接口相加，每1秒可请求20次<br />2、多个接口请求时，需注意/batch-kline接口需间隔1秒<br /> 3、所有接口相加，1分钟最大请求1200次(1秒20次) <br />4、每天总共最大可请求1728000次，超过则第二天凌晨恢复使用|
| 全部美股 | 每1秒，最大可20次请求 | 1、所以接口相加，每1秒可请求20次<br />2、多个接口请求时，需注意/batch-kline接口需间隔1秒<br /> 3、所有接口相加，1分钟最大请求1200次(1秒20次) <br />4、每天总共最大可请求1728000次，超过则第二天凌晨恢复使用|

### 接口限制
- 1、请务必阅读：[HTTP接口限制说明](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/http_interface/interface_limitation_cn.md)
- 2、请务必阅读：[错误码说明](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/error_code_description_cn.md)

### 接口地址
#### 1、美股、港股、A股、大盘数据接口地址：
- 基本路径: /quote-stock-b-api/kline
- 完整URL: https://quote.alltick.io/quote-stock-b-api/kline
  
#### 2、外汇、贵金属、加密货币、原油、CFD指数、商品接口地址：
- 基本路径: /quote-b-api/kline
- 完整URL: https://quote.alltick.io/quote-b-api/kline

### 请求示例
#### 1、美股、港股、A股、大盘数据请求示例：
在发送查询请求时，必须包含方法名和token信息。一个请求的示例如下：
<br />https://quote.alltick.io/quote-stock-b-api/kline?token=您的token&query=queryData

#### 2、外汇、贵金属、加密货币、原油、CFD指数、商品请求示例：
在发送查询请求时，必须包含方法名和token信息。一个请求的示例如下：
<br />https://quote.alltick.io/quote-b-api/kline?token=您的token&query=queryData

### 请求参数

| 名称                   | 位置  | 类型    | 必选 | 说明                                                         |
| ---------------------- | ----- | ------- | ---- | ------------------------------------------------------------ |
| token                  | query | string  | 否   |                                                          |
| query                   | query  | string  | 否   | 查看query请求参数说明                                   |

> query 请求参数

将如下json进行UrlEncode编码，赋值到url的查询字符串的query里
```json
{
  "trace": "3baaa938-f92c-4a74-a228-fd49d5e2f8bc-1678419657806",
  "data": {
    "code": "857.HK",
    "kline_type": 1,
    "kline_timestamp_end": 0,
    "query_kline_num": 2,
    "adjust_type": 0
  }
}
```

### query请求参数

| 名称                   | 类型    | 必选 | 说明                                                         |
| ---------------------- | ------- | ---- | ------------------------------------------------------------ |
| trace                | string  | 是   | 追踪码，用来查询日志使用，请保证每次请求时唯一 |
| data                 | object  | 是   |                                                          |
| » code                | string  | 是   | 请查看code列表，选择你要查询的code：[点击code列表](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863) |
| » kline_type          | integer | 是   | k线类型<br />1、1是1分钟K，2是5分钟K，3是15分钟K，4是30分钟K，5是小时K，6是2小时K(股票不支持2小时)，7是4小时K(股票不支持4小时)，8是日K，9是周K，10是月K （注：股票不支持2小时K、4小时K）<br />2、最短的k线只支持1分钟||
| » kline_timestamp_end | integer | 是   | 从指定时间往前查询K线<br />1、传0表示从当前最新的交易日往前查k线<br />2、指定时间请传时间戳，传时间戳表示从该时间戳往前查k线<br />3、只有外汇贵金属加密货币支持传时间戳，股票类的code不支持|
| » query_kline_num     | integer | 是   | 表示查询多少根K线，每次最大请求1000根，可根据时间戳循环往前请求 |
| » adjust_type     | integer | 是   | 复权类型,对于股票类的code才有效，例如：0:除权,1:前复权，目前仅支持0 |

> 返回示例

> OK

```json
{
  "ret": 200,
  "msg": "ok",
  "trace": "3baaa938-f92c-4a74-a228-fd49d5e2f8bc-1678419657806",
  "data": {
    "code": "857.HK",
    "kline_type": 1,
    "kline_list": [
      {
        "timestamp": "1677829200",
        "open_price": "136.421",
        "close_price": "136.412",
        "high_price": "136.422",
        "low_price": "136.407",
        "volume": "0",
        "turnover": "0"
      },
      {
        "timestamp": "1677829260",
        "open_price": "136.412",
        "close_price": "136.401",
        "high_price": "136.415",
        "low_price": "136.397",
        "volume": "0",
        "turnover": "0"
      }
    ]
  }
}
```

### 返回结果

| 状态码 | 状态码含义                                              | 说明 | 数据模型 |
| ------ | ------------------------------------------------------- | ---- | -------- |
| 200    | OK | OK   | Inline   |

### 返回数据结构

状态码 **200**

| 名称            | 类型     | 必选 | 约束 | 中文名 | 说明                                                         |
| --------------- | -------- | ---- | ---- | ------ | ------------------------------------------------------------ |
| » ret           | integer  | true |  |        |                                                          |
| » msg           | string   | true |  |        |                                                          |
| » trace         | string   | true |  |        |                                                          |
| » data          | object   | true |  |        |                                                          |
| »» code         | string   | true |  |        | 代码                                                         |
| »» kline_type   | integer  | true |  |        | k线类型<br />1、1是1分钟K，2是5分钟K，3是15分钟K，4是30分钟K，5是小时K，6是2小时K(股票不支持2小时)，7是4小时K(股票不支持4小时)，8是日K，9是周K，10是月K （注：股票不支持2小时K、4小时K）<br />2、最短的k线只支持1分钟|
| »» kline_list   | [object] | true |  |        |                                                          |
| »»» timestamp   | string   | true |  |        | 该K线时间戳                                                  |
| »»» open_price  | string   | true |  |        | 该K线开盘价                                                  |
| »»» close_price | string   | true |  |        | 该K线收盘价                                                  |
| »»» high_price  | string   | true |  |        | 该K线最高价                                                  |
| »»» low_price   | string   | true |  |        | 该K线最低价                                                  |
| »»» volume      | string   | true |  |        | 该K线成交数量                                                |
| »»» turnover    | string   | true |  |        | 该K线成交金额                                                |
