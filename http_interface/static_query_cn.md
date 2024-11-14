> [English](./latest_order_book_price_query.md) | [中文](./latest_order_book_price_query_cn.md)

## GET 产品信息查询

GET /static_info
> 完整的URL请参见[API地址说明](./api_address_description_cn.md)
> 目前只支持股票信息查询

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
    "static_info_list": [
      {
        "board": "HKEquity",
        "bps": "101.7577888985738336",
        "circulating_shares": "9267359712",
        "currency": "HKD",
        "dividend_yield": "3.4558141358352833",
        "eps": "13.7190213011686429",
        "eps_ttm": "18.0567016900844671",
        "exchange": "SEHK",
        "hk_shares": "9267359712",
        "lot_size": "100",
        "name_cn": "腾讯控股",
        "name_en": "TENCENT",
        "name_hk": "騰訊控股",
        "symbol": "700.HK",
        "total_shares": "9267359712"
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
|»» static_info_list|[object]|true||||
|»»» board|string|false|||股票所属板块|
|»»» bps|string|false|||每股净资产|
|»»» circulating_shares|string|false|||流通股本|
|»»» currency|string|false|||交易币种|
|»»» dividend_yield|string|false|||股息|
|»»» eps|string|false|||每股盈利|
|»»» eps_ttm|string|false|||每股盈利 (TTM)|
|»»» exchange|string|false|||产品所属交易所|
|»»» hk_shares|string|false|||港股股本 (仅港股)|
|»»» lot_size|string|false|||每手股数|
|»»» name_cn|string|false|||中文简体产品的名称|
|»»» name_en|string|false|||英文产品的名称|
|»»» name_hk|string|false|||中文繁体产品的名称|
|»»» symbol|string|false|||产品code|
|»»» total_shares|string|false|||总股本|
