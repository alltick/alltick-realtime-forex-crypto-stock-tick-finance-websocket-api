> [English](./batch_kline_query.md) | [中文](./batch_kline_query_cn.md)

## POST 批量查询产品最新K线

POST /batch-kline

> 完整的URL请参见[API地址说明](./api_address_description_cn.md)

### 接口限制

| 计划     | 单独请求                                                     | 同时请求多个http接口                                         |
| :------- | :----------------------------------------------------------- | :----------------------------------------------------------- |
| 免费     | 1、每10秒，可1次请求<br /> 2、每次可批量查询10，10=产品数量*K线类型 | 1、同1秒只能请求1个口<br /> 2、所有接口相加，1分钟最大请求10次(6秒1次) ，需注意/batch-kline接口需间隔10秒 |
| 基础     | 1、每5秒，只能1次请求<br /> 2、每次可批量查询100，100=产品数量*K线类型 | 1、同1秒只能请求1个接口<br /> 2、所有接口相加，1分钟最大请求60次(1秒1次)，需注意/batch-kline接口需间隔3秒 |
| 高级     | 1、每5秒，只能1次请求<br /> 2、每次可批量查询200，200=产品数量*K线类型 | 所有接口相加，1分钟最大请求600次(1秒10次)，需注意/batch-kline接口需间隔2秒 |
| 专业     | 1、每5秒，只能1次请求<br /> 2、每次可批量查询500，500=产品数量*K线类型 | 所有接口相加，1分钟最大请求1200次(1秒20次)，需注意/batch-kline接口需间隔1秒 |
| 全部港股 | 1、每5秒，只能1次请求<br /> 2、每次可批量查询500，500=产品数量*K线类型 | 所有接口相加，1分钟最大请求1200次(1秒20次)，需注意/batch-kline接口需间隔1秒 |
| 全部A股  | 1、每5秒，只能1次请求<br /> 2、每次可批量查询500，500=产品数量*K线类型 | 所有接口相加，1分钟最大请求1200次(1秒20次)，需注意/batch-kline接口需间隔1秒 |
| 全部美股 | 1、每5秒，只能1次请求<br /> 2、每次可批量查询500，500=产品数量*K线类型 | 所有接口相加，1分钟最大请求1200次(1秒20次)，需注意/batch-kline接口需间隔1秒 |

### 接口地址
**1、美股、港股、A股、大盘数据接口地址：**
- 基本路径: /quote-stock-b-api/batch-kline
- 完整URL: https://quote.tradeswitcher.com/quote-stock-b-api/batch-kline

**2、外汇、贵金属、加密货币、商品接口地址：**
- 基本路径: /quote-b-api/kline
- 完整URL: https://quote.tradeswitcher.com/quote-b-api/kline

### 请求示例
**1、美股、港股、A股、大盘数据请求示例：**
<br />批量查询产品最新K线功能，由于批量查询参数比较多，放入body中，url参数中只保留token字段参数。
<br />在发送查询请求时，必须包含方法名和token信息。一个请求的示例如下：
<br />https://quote.tradeswitcher.com/quote-stock-b-api/batch-kline?token=您的token

**2、外汇、贵金属、加密货币、商品请求示例：**
<br />批量查询产品最新K线功能，由于批量查询参数比较多，放入body中，url参数中只保留token字段参数。
<br />在发送查询请求时，必须包含方法名和token信息。一个请求的示例如下：
<br />https://quote.tradeswitcher.com/quote-b-api/batch-kline?token=您的token

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
|»»» kline_type|body|integer| 是 |k线类型，1是分钟K，2是5分钟K，3是15分钟K，4是30分钟K，5是小时K，6是2小时K(股票不支持2小时)，7是4小时K(股票不支持4小时)，8是日K，9是周K，10是月K （注：股票不支持2小时K、4小时K）|
|»»» kline_timestamp_end|body|integer| 是 |从那个时间点往前查，为0表示从当前时间，非股票类的code才有效|
|»»» query_kline_num|body|integer| 是 |查询多少根K线，只能查询最新1或者2根|
|»»» adjust_type|body|integer| 是 |复权类型,对于股票类的code才有效，例如：0:除权,1:前复权，目前仅支持0|

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
|»»» kline_type|integer|true|||k线类型，1是分钟K，2是5分钟K，3是15分钟K，4是30分钟K，5是小时K，6是2小时K(股票不支持2小时)，7是4小时K(股票不支持4小时)，8是日K，9是周K，10是月K （注：股票不支持2小时K、4小时K）|
|»»» kline_data|[array]|true||||
|»»»» timestamp|string|true|||该K线时间戳|
|»»»» open_price|string|true|||该K线开盘价|
|»»»» close_price|string|true|||该K线收盘价|
|»»»» high_price|string|true|||该K线最高价|
|»»»» low_price|string|true|||该K线最低价|
|»»»» volume|string|true|||该K线成交数量|
|»»»» turnover|string|true|||该K线成交金额|
