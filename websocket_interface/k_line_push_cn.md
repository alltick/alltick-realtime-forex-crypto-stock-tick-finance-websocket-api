> [English](./k_line_push.md) | [中文](./k_line_push_cn.md)

# K线推送(不支持)

# K线推送说明

Alltick的WebSocket接口不支持K线数据的推送。由于许多客户对此有疑问，特此说明：无论是历史K线还是实时K线，目前仅支持通过HTTP接口直接获取。推荐的实现方式如下：

**实现方式建议（仅供参考）：**

**1、定时拉取K线：** 为了实现K线的快速更新，建议购买高请求频率的套餐，以提高拉取频率。

**2、结合使用HTTP接口：** 建议客户将/kline和/batch-kline两个接口结合使用，具体步骤如下：

- 首先，通过/kline接口轮询请求历史数据并存储到本地数据库。后续的历史数据可直接从客户的数据库获取，无需再次通过接口请求。

- 然后，持续使用/batch-kline接口批量请求多个产品的最新两根K线，并将数据更新到数据库。

这种方式能够快速更新最新的K线，同时避免频繁请求历史K线导致请求频率受到限制。

# 涨跌幅说明

Alltick的接口不提供涨跌幅或24小时涨跌幅字段。客户可以通过获取Alltick的数据自行计算涨跌幅。

**1、每日涨跌幅计算方法：**

**方法一:** 使用HTTP接口获取当天的日K线收盘价(close_price)和前一日的日K线收盘价(close_price)，计算公式如下：

涨跌幅 = (当天收盘价 - 前一日收盘价) / 前一日收盘价 * 100%

**方法二：** 使用WebSocket接口获取最新价格(price)，并通过HTTP接口获取当天的日K线收盘价(close_price)，计算公式如下：

涨跌幅 = (最新价格 - 前一日收盘价) / 前一日收盘价 * 100%

**2、24小时涨跌幅计算方法：**

使用WebSocket的最新成交价格接口（请求-协议号：22004），实时接收逐笔成交价格（tick数据）。

需自行存储WebSocket接口推送的24小时前的最新价格，以便进行后续计算。

计算公式：

24小时涨跌幅 = (最新价格 - 24小时前的最新价格) / 24小时前的最新价格 * 100%

