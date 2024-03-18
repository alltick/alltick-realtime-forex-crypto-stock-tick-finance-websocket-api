> [English](./latest_transaction_price_query.md) | [中文](./latest_transaction_price_query_cn.md)

## GET 最新成交报价查询

GET /quote-stock-b-api/trade-tick

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

| 名称           | 类型     | 必选 | 说明 |
| -------------- | -------- | ---- | ---- |
| trace        | string   | 是   |  |
| data         | object   | 是   |  |
| » symbol_list | [object] | 是   |  |
| »» code       | string   | 否   | 代码 |

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
        "seq": "30841439",
        "tick_time": "1677831545217",
        "price": "136.302",
        "volume": "0",
        "turnover": "0",
        "trade_direction": 0
      }
    ]
  }
}
```

### 返回结果

| 状态码 | 状态码含义 | 说明 | 数据模型 |
| ------ | ---------- | ---- | -------- |
| 200    | OK         | OK   | Inline   |

### 返回数据结构

状态码 **200**

| 名称                | 类型     | 必选  | 约束 | 中文名 | 说明                                 |
| ------------------- | -------- | ----- | ---- | ------ | ------------------------------------ |
| » ret               | integer  | true  |  |        | 返回code                             |
| » msg               | string   | true  |  |        | 返回code对应消息                     |
| » trace             | string   | true  |  |        | 请求的trace                          |
| » data              | object   | true  |  |        |                                  |
| »» tick_list        | [object] | true  |  |        |                                  |
| »»» code            | string   | false |  |        | 代码                                 |
| »»» seq             | string   | false |  |        | 序号                                 |
| »»» tick_time       | string   | false |  |        | 时间戳                               |
| »»» price           | string   | false |  |        | 成交价                               |
| »»» volume          | string   | false |  |        | 成交量                               |
| »»» turnover        | string   | false |  |        | 成交额                               |
| »»» trade_direction | integer  | false |  |        | 交易方向，0为默认值，1为BUY，2为SELL |