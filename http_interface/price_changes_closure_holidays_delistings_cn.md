> [English](./price_changes_closure_holidays_delistings.md) | [中文](./price_changes_closure_holidays_delistings_cn.md)
# 涨跌幅、休市、假期、涨停跌停、新股上市和退市说明
# 涨跌幅说明

**Alltick的接口不提供涨跌幅或24小时涨跌幅字段。** 客户可以通过获取Alltick的数据自行计算涨跌幅。

**1、每日涨跌幅计算方法：**

- 方法一：使用HTTP接口获取当天的日K线收盘价(close_price)和前一日的日K线收盘价(close_price)，计算公式如下：

涨跌幅 = (当天收盘价 - 前一日收盘价) / 前一日收盘价 * 100%

- 方法二：使用WebSocket接口获取最新价格(price)，并通过HTTP接口获取前一日的日K线收盘价(close_price)，计算公式如下：

涨跌幅 = (最新价格 - 前一日收盘价) / 前一日收盘价 * 100%

**2、24小时涨跌幅计算方法：**

使用WebSocket的最新成交价格接口（请求-协议号：22004），实时接收逐笔成交价格（tick数据）。

需自行存储WebSocket接口推送的24小时前的最新价格，以便进行后续计算。

计算公式：

24小时涨跌幅 = (最新价格 - 24小时前的最新价格) / 24小时前的最新价格 * 100%


# 休市或交易时间说明

Alltick并未提供休市或交易时间的接口。客户可以通过[【产品列表】](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863)查看各类产品的固定交易时间。请点击以下链接访问产品列表：

[【产品列表】](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863)

# 假期说明
Alltick不提供假期接口。假期休市通知将提前在我们的Telegram频道发布，具体休市的产品信息请以Telegram频道的通知为准。请及时关注频道以获取假期休市的最新通知。您可以通过以下链接关注我们的Telegram频道：

中文频道：[Telegram的频道](https://t.me/alltick_cn)

英文频道：[Telegram Channel](https://t.me/alltick_en)



# 股票涨停跌停说明

Alltick未提供涨停和跌停的判断接口。客户可以通过以下方式判断股票是否涨停或跌停：

**深度盘口接口数据判断：** 当订阅深度盘口接口时，如果仅一侧有数据，而另一侧的价格和成交量均返回为0，则可判断为涨停或跌停。具体判断方法如下：

- 如果只有bid一侧有数据，而ask的价格和成交量全部返回为0，则该股票属于涨停。

- 如果只有ask一侧有数据，而bid的价格和成交量全部返回为0，则该股票属于跌停。

以下是数据返回的示例截图：
<img width="799" alt="image" src="https://github.com/user-attachments/assets/58ecf4f3-39c2-484f-8dbf-488bfa7ee6f9" />

# 股票退市判断说明

Alltick未提供退市判断接口。客户可以通过以下方式判断股票是否已退市：

**判断方法：** 当订阅深度盘口接口时，如果bid和ask两侧的价格和成交量全部返回为0，则表示该股票已退市。

以下是数据返回的示例截图：

<img width="848" alt="image" src="https://github.com/user-attachments/assets/778ca5bd-64b8-4e26-ab81-dfcc1016300d" />

# 新股上市说明

Alltick未提供新股上市的判断接口。我们会定期更新 [【产品列表】](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863)，以反映新上市的股票，并已将退市的股票从列表中删除。

产品列表点击以下链接：

[【产品列表】](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863)



