> [English](./batch_kline_query.md) | [中文](./batch_kline_query_cn.md)

## GET 批量查询产品最新K线

GET /batch-kline

> 完整的URL请参见[API地址说明](./api_address_description_cn.md)

### 批量查询产品最新K线功能，由于批量查询参数比较多，放入body中，url参数中只保留token字段参数。

> Body 请求参数

```json
{
  "trace": "c2a8a146-a647-4d6f-ac07-8c4805bf0b74",
  "data": {
    "data_list": [
      {
        "code": "700.HK",
        "kline_type": 1,
        "kline_timestamp_end": 0,
        "query_kline_num": 1,
        "adjust_type": 0
      },
      {
        "code": "GOOGL.US",
        "kline_type": 1,
        "kline_timestamp_end": 0,
        "query_kline_num": 1,
        "adjust_type": 0
      }
    ]
  }
}
```

### 请求参数

|名称|位置|类型|必选|说明|
|---|---|---|---|---|
|token|query|string| 是 |如果不知道你的token，请联系相关人员索要|
|body|body|object| 否 ||
|» trace|body|string| 是 |追踪码，用来查询日志使用，请保证每次请求时唯一|
|» data|body|object| 是 ||
|»» data_list|body|[object]| 是 ||
|»»» code|body|string| 是 |请查看code列表，选择你要查询的code|
|»»» kline_type|body|integer| 是 |k线类型，1分钟K，2为5分钟K，3为15分钟K，4为30分钟K，5为小时K，6为2小时K，7为4小时K，8为日K，9为周K，10为月K|
|»»» kline_timestamp_end|body|integer| 是 |从那个时间点往前查，为0表示从当前时间，非股票类的code才有效|
|»»» query_kline_num|body|integer| 是 |查询多少根K线，只能查询最新1根，固定传1|
|»»» adjust_type|body|integer| 是 |复权类型,对于股票类的code才有效，例如：0:除权,1:前复权|

> 返回示例

> OK

```json
{
  "ret": 200,
  "msg": "ok",
  "trace": "c2a8a146-a647-4d6f-ac07-8c4805bf0b74",
  "data": {
    "kline_list": [
      {
        "code": "700.HK",
        "kline_type": 1,
        "kline_data": [
          {
            "timestamp": "1677829200",
            "open_price": "136.421",
            "close_price": "136.412",
            "high_price": "136.422",
            "low_price": "136.407",
            "volume": "0",
            "turnover": "0"
          }
        ]
      },
      {
        "code": "GOOGL.US",
        "kline_type": 1,
        "kline_data": [
          {
            "timestamp": "1677829200",
            "open_price": "136.421",
            "close_price": "136.412",
            "high_price": "136.422",
            "low_price": "136.407",
            "volume": "0",
            "turnover": "0"
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
|» ret|integer|true||||
|» msg|string|true||||
|» trace|string|true||||
|» data|object|true||||
|»» kline_list|[array]|true||||
|»»» code|string|true|||产品代码|
|»»» kline_type|integer|true|||k线类型，1分钟K，2为5分钟K，3为15分钟K，4为30分钟K，5为小时K，6为2小时K，7为4小时K，8为日K，9为周K，10为月K|
|»»» kline_data|[array]|true||||
|»»»» timestamp|string|true|||该K线时间戳|
|»»»» open_price|string|true|||该K线开盘价|
|»»»» close_price|string|true|||该K线收盘价|
|»»»» high_price|string|true|||该K线最高价|
|»»»» low_price|string|true|||该K线最低价|
|»»»» volume|string|true|||该K线成交数量|
|»»»» turnover|string|true|||该K线成交金额|