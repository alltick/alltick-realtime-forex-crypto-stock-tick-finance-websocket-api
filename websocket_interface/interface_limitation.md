> [English](./interface_limitation.md) | [中文](./interface_limitation_cn.md)

# WebSocket Interface Restrictions

### WebSocket Interface Restriction 1 - IP-based Restriction (Free Trial)
For the same token and the same IP, only one WebSocket connection can be established.

### WebSocket Interface Restriction 2 - Connection Limit (Free Trial)
To avoid excessive requests causing excessive pressure on backend services, the maximum number of connections for stock-ws-api is limited to 100. Adjustments will be made based on the performance of the subsequent service. Connections exceeding this limit will be disconnected directly.

### WebSocket Interface Restriction 3 - Interface Call Rate Limit (Free Trial)
Multiple requests from a WebSocket connection must be sent with a minimum interval of 1 second. For example, if A calls stock-ws-api at 28 minutes and 30 seconds, regardless of whether the WebSocket connection is disconnected, if A then calls stock-ws-api again, at the same time (28 minutes and 30 seconds), the second request will be rejected.

### WebSocket Interface Restriction 4 - Quote Subscription Limit (Free Trial)
For a single subscription, you can subscribe to a maximum of 5 codes. If you subscribe to more than 5, only 5 will be subscribed to.
