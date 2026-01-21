> [English](./static_query.md) | [中文](./static_query_cn.md)

## GET 复牌信息查询接口

## GET /api/suspension

### 接口说明
该接口提供全球主要交易所（SSE、NYSE、NASDAQ）的停复牌信息查询，所有接口均返回JSON格式数据，按公告时间倒序排列。

### 请求频率

| 计划     | 单个接口单独请求             | 同时请求多个http接口                                         |
| :------- | :-------------------- | :----------------------------------------------------------- |
| 免费     | 每1分钟只能1次请求   | 1、同1秒只能请求1个接口<br />2、多个接口请求时，需注意/batch-kline接口需间隔10秒<br /> 3、所有接口相加，1分钟最大请求10次(6秒1次) <br />4、每天总共最大可请求14400次，超过则第二天凌晨恢复使用|
| 基础     | 每1分钟只能1次请求    | 1、同1秒只能请求1个接口<br />2、多个接口请求时，需注意/batch-kline接口需间隔3秒<br /> 3、所有接口相加，1分钟最大请求60次(1秒1次)<br />4、每天总共最大可请求86400次，超过则第二天凌晨恢复使用 |
| 高级     | 每1分钟只能1次请求 | 1、所以接口相加，每1秒可请求10次<br />2、多个接口请求时，需注意/batch-kline接口需间隔2秒<br /> 3、所有接口相加，1分钟最大请求600次(1秒10次) <br />4、每天总共最大可请求864000次，超过则第二天凌晨恢复使用|
| 专业     | 每1分钟只能1次请求 | 1、所以接口相加，每1秒可请求20次<br />2、多个接口请求时，需注意/batch-kline接口需间隔1秒<br /> 3、所有接口相加，1分钟最大请求1200次(1秒20次)<br /> 4、每天总共最大可请求1728000次，超过则第二天凌晨恢复使用|
| 全部港股 | 每1分钟只能1次请求 | 1、所以接口相加，每1秒可请求20次<br />2、多个接口请求时，需注意/batch-kline接口需间隔1秒<br /> 3、所有接口相加，1分钟最大请求1200次(1秒20次)<br /> 4、每天总共最大可请求1728000次，超过则第二天凌晨恢复使用|
| 全部A股  | 每1分钟只能1次请求 | 1、所以接口相加，每1秒可请求20次<br />2、多个接口请求时，需注意/batch-kline接口需间隔1秒<br /> 3、所有接口相加，1分钟最大请求1200次(1秒20次) <br />4、每天总共最大可请求1728000次，超过则第二天凌晨恢复使用|
| 全部美股 | 每1分钟只能1次请求 | 1、所以接口相加，每1秒可请求20次<br />2、多个接口请求时，需注意/batch-kline接口需间隔1秒<br /> 3、所有接口相加，1分钟最大请求1200次(1秒20次) <br />4、每天总共最大可请求1728000次，超过则第二天凌晨恢复使用|

### 接口限制
- 1、请务必阅读：[HTTP接口限制说明](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/http_interface/interface_limitation_cn.md)
- 2、请务必阅读：[错误码说明](https://github.com/alltick/alltick-realtime-forex-crypto-stock-tick-finance-websocket-api/blob/main/error_code_description_cn.md)

### 接口地址
#### 1、询上海证券交易所停复牌信息：
- 基本路径: /api/suspension/sse
- 完整URL: https://quote.alltick.co/api/suspension/sse
  
#### 2、查询纽约证券交易所停复牌信息：
- 基本路径: /api/suspension/nyse
- 完整URL: https://quote.alltick.co/api/suspension/nyse

#### 3、查询纳斯达克交易所停复牌信息：
- 基本路径: /api/suspension/nasdaq
- 完整URL: https://quote.alltick.co/api/suspension/nasdaq


### 请求示例

#### 1、获取上证所数据接口：
#### 接口信息
- **URL**: `/api/suspension/sse`
- **方法**: `GET`
- **描述**: 获取上海证券交易所（SSE）全部停复牌信息

### 请求参数
| 参数 | 类型 | 必填 | 描述 |
|----|----|----|----|
| token | string | 是 | 用户 token |
| page | int | 否 | 页码 |
| size | int | 否 | 每页大小 |

### 响应示例
```json
{
  "success": true,
  "timestamp": "2024-01-15T10:30:00",
  "totalCount": 125,
  "data": [
    {
      "symbol": "600000",
      "symbolName": "浦发银行",
      "haltReason": "重大事项停牌",
      "haltDate": "2024-01-15",
      "haltTime": "09:30:00",
      "haltPeriod": "全天停牌",
      "resumeDate": "2024-01-16",
      "resumeTime": "09:30:00",
      "publishDate": "2024-01-14 18:00:00"
    }
  ]
}
```

# 响应字段说明

## 公共字段

| 字段名        | 类型    | 是否必填 | 描述                                   |
|---------------|---------|----------|----------------------------------------|
| » success     | boolean | 是       | 请求是否成功                           |
| » timestamp   | string  | 是       | 响应时间戳（格式：yyyy-MM-dd'T'HH:mm:ss） |
| » totalCount  | integer | 是       | 数据总条数                             |
| » data        | array   | 是       | 停复牌信息列表                         |
| » totalPages  | integer | 否       | 数据总页数（分页查询时返回）           |
| » currentPage | integer | 否       | 当前页（分页查询时返回）               |
| » currentSize | integer | 否       | 当前页的数据条数（分页查询时返回）     |

---

## data字段（停复牌信息列表中的对象）

每个对象包含以下字段：

| 字段名       | 类型   | 是否允许为空 | 描述       |
|--------------|--------|--------------|------------|
| » symbol     | string | 否           | 股票代码   |
| » symbolName | string | 是           | 股票名称   |
| » haltReason | string | 是           | 停牌原因   |
| » haltDate   | string | 是           | 停牌日期   |
| » haltTime   | string | 是           | 停牌时间   |
| » haltPeriod | string | 是           | 停牌期限   |
| » resumeDate | string | 是           | 复牌日期   |
| » resumeTime | string | 是           | 复牌时间   |
| » publishDate| string | 否           | 公告时间   |

---

## 调用示例

curl -X GET "https://quote.alltick.co/api/suspension/sse?token=您的Token&page=1&size=10"

#### 2、获取纽交所数据接口：
#### 接口信息
- **URL**: `/api/suspension/nyse`
- **方法**: `GET`
- **描述**: 获取纽约证券交易所（NYSE）全部停复牌信息

### 请求参数
| 参数 | 类型 | 必填 | 描述 |
|----|----|----|----|
| token | string | 是 | 用户 token |
| page | int | 否 | 页码 |
| size | int | 否 | 每页大小 |

### 响应示例
```json
{
  "success": true,
  "timestamp": "2024-01-15T10:30:00",
  "totalCount": 89,
  "data": [
    {
      "symbol": "AAPL",
      "haltReason": "新闻待公布",
      "haltDate": "2024-01-15",
      "haltTime": "10:15:00",
      "haltDateTime": "2024-01-15 10:15:00",
      "resumeDate": "2024-01-15",
      "resumeTime": "11:00:00",
      "resumeDateTime": "2024-01-15 11:00:00",
      "sourceExchange": "NYSE"
      "publishDate": "2024-01-15 10:10:00
    }
  ]
}

```

# 响应字段说明

## 公共字段

| 字段名        | 类型    | 是否必填 | 描述                                   |
|---------------|---------|----------|----------------------------------------|
| » success     | boolean | 是       | 请求是否成功                           |
| » timestamp   | string  | 是       | 响应时间戳（格式：yyyy-MM-dd'T'HH:mm:ss） |
| » totalCount  | integer | 是       | 数据总条数                             |
| » data        | array   | 是       | 停复牌信息列表                         |
| » totalPages  | integer | 否       | 数据总页数（分页查询时返回）           |
| » currentPage | integer | 否       | 当前页（分页查询时返回）               |
| » currentSize | integer | 否       | 当前页的数据条数（分页查询时返回）     |

---

## data字段（停复牌信息列表中的对象）

每个对象包含以下字段：

| 字段名       | 类型   | 是否允许为空 | 描述       |
|--------------|--------|--------------|------------|
| » symbol     | string | 否           | 股票代码   |
| » symbolName | string | 是           | 股票名称   |
| » haltReason | string | 是           | 停牌原因   |
| » haltTime   | string | 是           | 停牌时间   |
| » haltDateTime   | string | 是           | 停牌日期时间   |
| » resumeDate | string | 是           | 复牌日期   |
| » resumeTime | string | 是           | 复牌时间   |
| » resumeDateTime | string | 是           | 复牌日期时间   |
| » sourceExchange| string | 是           | 交易所代码   |
| » publishDate| string | 否           | 公告时间   |

---

## 调用示例

curl -X GET "<https://quote.alltick.co/api/suspension/nyse?token=您的Token&page=1&size=10>" -H "Accept: application/json"

#### 3、 获取纳斯达克数据接口：
#### 接口信息
- **URL**: `/api/suspension/nasdaq`
- **方法**: `GET`
- **描述** 获取纳斯达克交易所（NASDAQ）全部停复牌信息

### 请求参数
| 参数 | 类型 | 必填 | 描述 |
|----|----|----|----|
| token | string | 是 | 用户 token |
| page | int | 否 | 页码 |
| size | int | 否 | 每页大小 |

### 响应示例
```json
{
  "success": true,
  "timestamp": "2024-01-15T10:30:00",
  "totalCount": 156,
  "data": [
    {
      "symbol": "GOOGL",
      "haltDate": "2024-01-15",
      "haltTime": "13:45:00",
      "haltDateTime": "2024-01-15 13:45:00",
      "sourceExchange": "NASDAQ",
      "haltReason": "波动性暂停",
      "pauseThresholdPrice": "145.50",
      "resumeDate": "2024-01-15",
      "resumeTime": "14:00:00",
      "resumeDateTime": "2024-01-15 14:00:00",
      "publishDate": "2024-01-15 13:44:30"
    }
  ]
}

```

# 响应字段说明

## 公共字段

| 字段名        | 类型    | 是否必填 | 描述                                   |
|---------------|---------|----------|----------------------------------------|
| » success     | boolean | 是       | 请求是否成功                           |
| » timestamp   | string  | 是       | 响应时间戳（格式：yyyy-MM-dd'T'HH:mm:ss） |
| » totalCount  | integer | 是       | 数据总条数                             |
| » data        | array   | 是       | 停复牌信息列表                         |
| » totalPages  | integer | 否       | 数据总页数（分页查询时返回）           |
| » currentPage | integer | 否       | 当前页（分页查询时返回）               |
| » currentSize | integer | 否       | 当前页的数据条数（分页查询时返回）     |

---

## data字段（停复牌信息列表中的对象）

每个对象包含以下字段：

| 字段名                | 类型   | 是否允许为空 | 描述         |
|-----------------------|--------|--------------|--------------|
| » symbol              | string | 否           | 股票代码     |
| » symbolName          | string | 是           | 股票名称     |
| » haltDate            | string | 是           | 停牌日期     |
| » haltTime            | string | 是           | 停牌时间     |
| » haltDateTime        | string | 是           | 停牌日期时间 |
| » sourceExchange      | string | 是           | 交易所代码   |
| » haltReason          | string | 是           | 停牌原因     |
| » pauseThresholdPrice | string | 是           | 暂停阈值价格 |
| » resumeDate          | string | 是           | 恢复日期     |
| » resumeTime          | string | 是           | 恢复报价时间 |
| » resumeDateTime      | string | 是           | 恢复交易时间 |
| » publishDate         | string | 否           | 公告时间     |

---

## 调用示例

curl -X GET "<https://quote.alltick.co/api/suspension/nasdaq?token=您的Token&page=1&size=10>" -H "Accept: application/json"

# 错误响应

所有接口在发生错误时返回以下格式：

```json
{
    "success": false,
    "error": "错误描述信息"
}
```
HTTP状态码: 500

## 错误响应字段说明

| 字段名  | 类型    | 是否必填 | 描述                       |
|---------|---------|----------|----------------------------|
| success | boolean | 是       | 请求是否成功，固定为 false |
| error   | string  | 是       | 错误描述信息               |

# 注意事项

1. 所有接口均不支持分页，返回最近一年的全量数据  
2. 数据已按公告时间倒序排列（最新的在前）  
3. 响应中的时间格式：  
   - `timestamp` 字段：ISO格式（yyyy-MM-dd'T'HH:mm:ss）  
   - 其他时间字段：yyyy-MM-dd HH:mm:ss  
4. 建议设置适当的超时时间，大数据量时可能需要较长时间  
5. 字段为空说明：  
   - **"否"**：字段始终有值，不会为 null  
   - **"是"**：字段可能为 null 或空字符串，调用方需进行空值判断
