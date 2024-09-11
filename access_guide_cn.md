> [English](./access_guide.md) | [中文](./access_guide_cn.md)

# 接入流程

### 第1步：通过行情地址说明文档了解接口的访问url以及请求时携带的参数
- [http行情API地址说明](./http_interface/api_address_description_cn.md)
- [websocket行情API地址说明](./websocket_interface/api_address_description_cn.md)
### 第2步：申请属于你的token
- [token申请](./token_application_cn.md)
### 第3步：请看接口限制说明文档，了解调用时应该有那些需要注意的地方，避免调用被拒绝
- [http接口限制](./http_interface/interface_limitation_cn.md)
- [websocket接口限制](./websocket_interface/interface_limitation_cn.md)
- [错误码说明](./error_code_description_cn.md)
### 第4步：请查看通用标准头说明文档，了解请求和响应的数据格式如何
- [http通用标准头](./http_interface/common_standard_header_cn.md)
- [websocket通用标准头](./websocket_interface/common_standard_header_cn.md)
### 第5步：请查看code列表文档，好决定要那一个产品的行情数据
- [产品code列表-A股](./product_code_list_A_stock_cn.md)
- [产品code列表-港股](./product_code_list_HK_stock_cn.md)
- [产品code列表-加密货币(数字币)](./product_code_list_cryptocurrency_cn.md)
- [产品code列表-美股](./product_code_list_US_stock_cn.md)
- [产品code列表-商品(贵金属)](./product_code_list_commodities_gold_cn.md)
- [产品code列表-外汇](./product_code_list_forex_cn.md)
### 第6步：请求具体接口获取你想要的数据
#### http接口
- [获取最新成交报价查询](./http_interface/latest_transaction_price_query_cn.md)
- [最新盘口报价查询](./http_interface/latest_order_book_price_query_cn.md)
- [K线查询](./http_interface/kline_query_cn.md)
- [批量查询产品最新K线](./http_interface/batch_kline_query_cn.md)
#### websocket接口
- [心跳](./websocket_interface/heartbeat_cn.md)
- [成交报价订阅](./websocket_interface/realtime_transaction_quote_subscription_cn.md)
- [盘口报价订阅](./websocket_interface/realtime_order_book_quote_subscription_cn.md)
- [取消报价订阅](./websocket_interface/cancel_realtime_quote_subscription_cn.md)
