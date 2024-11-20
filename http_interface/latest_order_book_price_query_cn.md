> [English](./latest_order_book_price_query.md) | [中文](./latest_order_book_price_query_cn.md)

## GET 最新盘口(Order Book)查询

GET /depth-tick
> 完整的URL请参见[API地址说明](./api_address_description_cn.md)

### 请求频率

| 计划     | 单独请求              | 同时请求多个http接口                                         |
| :------- | :-------------------- | :----------------------------------------------------------- |
| 免费     | 每10秒，只能1次请求   | 1、同1秒只能请求1个接口<br />2、多个接口请求时，需注意/batch-kline接口需间隔10秒<br /> 3、所有接口相加，1分钟最大请求10次(6秒1次) |
| 基础     | 每1秒，只能1次请求    | 1、同1秒只能请求1个接口<br />2、多个接口请求时，需注意/batch-kline接口需间隔3秒<br /> 3、所有接口相加，1分钟最大请求60次(1秒1次) |
| 高级     | 每1秒，最大可10次请求 | 1、所以接口相加，每1秒可请求10次<br />2、多个接口请求时，需注意/batch-kline接口需间隔2秒<br /> 3、所有接口相加，1分钟最大请求600次(1秒10次) |
| 专业     | 每1秒，最大可20次请求 | 1、所以接口相加，每1秒可请求20次<br />2、多个接口请求时，需注意/batch-kline接口需间隔1秒<br /> 3、所有接口相加，1分钟最大请求1200次(1秒20次) |
| 全部港股 | 每1秒，最大可20次请求 | 1、所以接口相加，每1秒可请求20次<br />2、多个接口请求时，需注意/batch-kline接口需间隔1秒<br /> 3、所有接口相加，1分钟最大请求1200次(1秒20次) |
| 全部A股  | 每1秒，最大可20次请求 | 1、所以接口相加，每1秒可请求20次<br />2、多个接口请求时，需注意/batch-kline接口需间隔1秒<br /> 3、所有接口相加，1分钟最大请求1200次(1秒20次) |
| 全部美股 | 每1秒，最大可20次请求 | 1、所以接口相加，每1秒可请求20次<br />2、多个接口请求时，需注意/batch-kline接口需间隔1秒<br /> 3、所有接口相加，1分钟最大请求1200次(1秒20次) |

### 接口地址
#### 1、美股、港股、A股、大盘数据接口地址：
- 基本路径: /quote-stock-b-api/depth-tick
- 完整URL: https://quote.tradeswitcher.com/quote-stock-b-api/depth-tick
#### 2、外汇、贵金属、加密货币、商品接口地址：
- 基本路径: /quote-b-api/depth-tick
- 完整URL: https://quote.tradeswitcher.com/quote-b-api/depth-tick

### 请求示例
#### 1、美股、港股、A股、大盘数据接口地址：
在发送查询请求时，必须包含方法名和token信息。一个请求的示例如下：
<br />https://quote.tradeswitcher.com/quote-stock-b-api/depth-tick?token=您的token&query=queryData
#### 2、外汇、贵金属、加密货币、商品接口地址：
在发送查询请求时，必须包含方法名和token信息。一个请求的示例如下：
<br />https://quote.tradeswitcher.com/quote-b-api/depth-tick?token=您的token&query=queryData


### 请求参数

| 名称                   | 位置  | 类型    | 必选 | 说明                                                         |
| ---------------------- | ----- | ------- | ---- | ------------------------------------------------------------ |
| token                  | query | string  | 否   |                                                          |
| query                   | query  | string  | 否   | 查看query请求参数说明                                   |

> query 请求参数

将如下json进行UrlEncode编码，赋值到url的查询字符串的query里
```json
{
  "trace": "edd5df80-df7f-4acf-8f67-68fd2f096426",
  "data": {
    "symbol_list": [
      {
        "code": "857.HK"
      },
      {
        "code": "UNH.US"
      }
    ]
  }
}
```

### query请求参数

|名称|类型|必选|说明|
|---|---|---|---|
|trace|string| 是 ||
|data|object| 是 ||
|» symbol_list|[object]| 是 ||
|»» code|string| 否 |代码|

> 返回示例

> OK

```json
{
  "ret": 200,
  "msg": "ok",
  "trace": "edd5df80-df7f-4acf-8f67-68fd2f096426",
  "data": {
    "tick_list": [
      {
        "code": "857.HK",
        "seq": "30686349",
        "tick_time": "1677830357227",
        "bids": [
          {
            "price": "136.424",
            "volume": "100000.00"
          }
        ],
        "asks": [
          {
            "price": "136.427",
            "volume": "400000.00"
          }
        ]
      }
    ]
  }
}
```

### 返回结果

|状态码|状态码含义|说明|数据模型|
|---|---|---|---|
|200|OK|OK|Inline|

### 返回数据结构

状态码 **200**

|名称|类型|必选|约束|中文名|说明|
|---|---|---|---|---|---|
|» ret|integer|true|||返回code|
|» msg|string|true|||返回code对应消息|
|» trace|string|true|||请求的trace|
|» data|object|true||||
|»» tick_list|[object]|true||||
|»»» code|string|false|||代码|
|»»» seq|string|false|||报价序号|
|»»» tick_time|string|false|||报价时间戳|
|»»» bids|[object]|false|||bid列表|
|»»»» price|string|false|||价|
|»»»» volume|string|false|||量|
|»»» asks|[object]|false|||ask列表|
|»»»» price|string|false|||价|
|»»»» volume|string|false|||量|
