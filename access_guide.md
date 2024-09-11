> [English](./access_guide.md) | [中文](./access_guide_cn.md)

# Integration Process

### Step 1: Understand the access URLs and parameters required for the API by referring to the market address documentation.

- [HTTP Market API Address Description](./http_interface/api_address_description.md)
- [WebSocket Market API Address Description](./websocket_interface/api_address_description.md)

### Step 2: Apply for your token.

- [Token Application](./token_application.md)

### Step 3: Please refer to the interface restriction documentation to understand important considerations when making API calls to avoid being rejected.

- [HTTP Interface Restrictions](./http_interface/interface_limitation.md)
- [WebSocket Interface Restrictions](./websocket_interface/interface_limitation.md)
- [Error Code Description](./error_code_description.md)

### Step 4: Please refer to the common standard headers documentation to understand the data format for requests and responses.

- [HTTP Common Standard Headers](./http_interface/common_standard_header.md)
- [WebSocket Common Standard Headers](./websocket_interface/common_standard_header.md)

### Step 5: Please refer to the code list documentation to decide which product's market data you want.

- [Product Code List - A-share](./product_code_list_A_stock.md)
- [Product Code List - Hong Kong Stock](./product_code_list_HK_stock.md)
- [Product Code List - Cryptocurrency (Digital Currency)](./product_code_list_cryptocurrency.md)
- [Product Code List - US Stock](./product_code_list_US_stock.md)
- [Product Code List - Commodity (Precious Metals)](./product_code_list_commodities_gold.md)
- [Product Code List - Forex](./product_code_list_forex.md)

### Step 6: Request specific APIs to obtain the desired data.

#### HTTP Interface

- [Get Latest Transaction Quote Query](./http_interface/latest_transaction_price_query.md)
- [Get Latest Order Book Quote Query](./http_interface/latest_order_book_price_query.md)
- [K-Line Query](./http_interface/kline_query.md)
- [Batch K-Line Query](./http_interface/batch_kline_query.md)

#### WebSocket Interface

- [Heartbeat](./websocket_interface/heartbeat.md)
- [Transaction Quote Subscription](./websocket_interface/realtime_transaction_quote_subscription.md)
- [Order Book Quote Subscription](./websocket_interface/realtime_order_book_quote_subscription.md)
- [Cancel Quote Subscription](./websocket_interface/cancel_realtime_quote_subscription.md)
