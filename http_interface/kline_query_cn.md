> [English](./kline_query.md) | [中文](./kline_query_cn.md)

## GET K线查询

GET /kline
> 完整的URL请参见[API地址说明](./api_address_description_cn.md)

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
| » code                | string  | 是   | 请查看code列表，选择你要查询的code |
| » kline_type          | integer | 是   | k线类型，1分钟K，2为5分钟K，3为15分钟K，4为30分钟K，5为小时K，6为2小时K，7为4小时K，8为日K，9为周K，10为月K （注：股票不支持2小时K、4小时K）|
| » kline_timestamp_end | integer | 是   | 从那个时间点往前查，为0表示从当前时间，非股票类的code才有效 |
| » query_kline_num     | integer | 是   | 查询多少根K线，最多1000根 |
| » adjust_type     | integer | 是   | 复权类型,对于股票类的code才有效，例如：0:除权,1:前复权 |

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
| »» kline_type   | integer  | true |  |        | k线类型，1分钟K，2为5分钟K，3为15分钟K，4为30分钟K，5为小时K，6为2小时K，7为4小时K，8为日K，9为周K，10为月K （注：股票不支持2小时K、4小时K）|
| »» kline_list   | [object] | true |  |        |                                                          |
| »»» timestamp   | string   | true |  |        | 该K线时间戳                                                  |
| »»» open_price  | string   | true |  |        | 该K线开盘价                                                  |
| »»» close_price | string   | true |  |        | 该K线收盘价                                                  |
| »»» high_price  | string   | true |  |        | 该K线最高价                                                  |
| »»» low_price   | string   | true |  |        | 该K线最低价                                                  |
| »»» volume      | string   | true |  |        | 该K线成交数量                                                |
| »»» turnover    | string   | true |  |        | 该K线成交金额                                                |
