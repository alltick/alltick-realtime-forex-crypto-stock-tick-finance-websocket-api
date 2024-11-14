> [English](./static_query.md) | [中文](./static_query_cn.md)

## GET Product information query

GET /static_info
> Please refer to the complete URL in [API Address Description](./api_address_description.md)
Currently only supports stock information query

### Request Parameters

| Name                   | Position | Type    | Required | Description                                                  |
| ---------------------- | -------- | ------- | -------- | ------------------------------------------------------------ |
| token                  | query    | string  | No       |                                                              |
| query                  | query    | string  | No       | See explanation for query request parameters                  |

> Query Request Parameters

Encode the following JSON into URL format and assign it to the `query` query string in the URL.
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

### Query Request Parameters

| Name       | Type   | Required | Description |
| ---------- | ------ | -------- | ----------- |
| trace      | string | Yes      |             |
| data       | object | Yes      |             |
| » symbol_list | [object] | Yes      |             |
| » » code       | string | No       | Code        |

> Response Example

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

### Response Result

| Status Code | Status Meaning | Description | Data Model |
| ----------- | -------------- | ----------- | ---------- |
| 200         | OK             | OK          | Inline     |

### Response Data Structure

Status Code **200**

| Name       | Type    | Required | Constraints | Chinese Name | Description |
| ---------- | ------- | -------- | ----------- | ------------ | ----------- |
| » ret      | integer | true     |             |              | Return code |
| » msg      | string  | true     |             |              | Message corresponding to the return code |
| » trace    | string  | true     |             |              | Request trace |
| » data     | object  | true     |             |              |             |
| »» static_info_list | [object] | true  |             |              |             |
|»»» board|string|false|||The sector to which the stock belongs|
|»»» bps|string|false|||Net assets per share|
|»»» circulating_shares|string|false|||circulating capital|
|»»» currency|string|false|||Transaction currency|
|»»» dividend_yield|string|false|||dividends|
|»»» eps|string|false|||earnings per share|
|»»» eps_ttm|string|false|||earnings per share (TTM)|
|»»» exchange|string|false|||The exchange to which the product belongs|
|»»» hk_shares|string|false|||Hong Kong stocks share capital (Hong Kong stocks only)|
|»»» lot_size|string|false|||Number of shares per lot|
|»»» name_cn|string|false|||Product name in simplified Chinese|
|»»» name_en|string|false|||English product name|
|»»» name_hk|string|false|||Product name in traditional Chinese|
|»»» symbol|string|false|||Product code|
|»»» total_shares|string|false|||total share capital|
