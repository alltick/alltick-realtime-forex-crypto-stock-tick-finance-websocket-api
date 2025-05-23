> [English](./interface_limitation.md) | [中文](./interface_limitation_cn.md)

# websocket接口限制

## 1、IP类限制
- Websocket的连接数是根据Token允许的连接数做限制的，不针对IP地址限制。
- 例如：基础计划规定一个Token只允许一个websocket连接，IP地址A已经发起了一个websocket连接的情况下，1、如果您使用相同的IP地址A尝试发起第二个websocket连接将会被拒绝；2、如果您使用IP地址B尝试发起第二个websocket连接也将会被拒绝；原因都是因为基础计划只允许一个websocket连接。
- 例如：高级计划规定一个Token只允许三个websocket连接，可以通过IP地址A同时发起三个websocket连接，也可以IP地址A、IP地址B、IP地址C各自发起一个websocket连接，只要总的连接数不超过三个即可。
- 「股票大盘类数据」 和 「外汇贵金属原油类数据」 的请求url不同，两类数据同时连接计算为一个websocket连接，两类数据可同时请求，例如：基础计划规定一个Token只允许一个websocket连接，IP地址A已经对股票数据发起了一个websocket连接的情况下，依然可以再次用IP地址A或者IP地址B发起外汇贵金属类数据的一个websocket连接。

## 2、接口调用频率限制
- **最新成交价(逐笔Tick)接口**：每1秒，只能1次请求
- **盘口(Order Book)接口**：每1秒，只能1次请求
- 在一个WebSocket连接中，同时请求多个接口，请求发送的间隔必须至少为1秒。例如，如果用户A在28分30秒时通过WebSocket发送了一个请求，并在相同秒数内尝试发送另一个请求，那么第二次请求将会被系统拒绝。
- 在多个WebSocket连接中，用户需同时发起多个WebSocket请求时，请注意每个WebSocket请求间隔3秒，例如，用户A购买了高级计划，高级计划支持同时连接3WebSocket，如果用户A在28分30秒时发起了第一个WebSocket，则需间隔3秒，在28分34秒时可发起第二个WebSocket的订阅，当2个WebSocket订阅成功后，持续保持10秒发送一次心跳即可，接口将实时推送数据。

## 3、连接数限制
- 不同的计划，限制的连接数是不同的，详情如下图。
- 如果尝试建立的连接数超过规定的限制，超出部分的连接尝试将会被直接断开。

| 计划     | websocket连接数          |
| :------- | :----------------------- |
| 免费     | 只能建立1个websocket连接 |
| 基础     | 只能建立1个websocket连接 |
| 高级     | 可建立3个websocket连接   |
| 专业     | 可建立10个websocket连接  |
| 全部港股 | 可建立10个websocket连接  |
| 全部A股  | 可建立10个websocket连接  |
| 全部美股 | 可建立10个websocket连接  |

## 4、产品代码（code）订阅限制
- 通过单一WebSocket连接，用户一次最多只能订阅的产品代码（codes）的是有限制的，详细见下图。
- 如果试图订阅超过规定的订阅上限，系统将只处理限制数量内的最前面的请求数据，忽略其他的数据

| 计划     | code订阅数限制                                               |
| :------- | :----------------------------------------------------------- |
| 免费     | **最新成交价(逐笔Tick)接口**：最大同时请求5个产品<br /> **盘口(Order Book)接口**：最大同时请求5个产品 |
| 基础     | **最新成交价(逐笔Tick)接口**：最大同时请求100个产品<br /> **盘口(Order Book)接口**：最大同时请求100个产品 |
| 高级     | **最新成交价(逐笔Tick)接口**：最大同时请求200个产品<br /> **盘口(Order Book)接口**：最大同时请求200个产品 |
| 专业     | **最新成交价(逐笔Tick)接口**：最大同时请求3000个产品<br /> **盘口(Order Book)接口**：最大同时请求3000个产品 |
| 全部港股 | **最新成交价(逐笔Tick)接口**：最大同时请求3000个产品<br /> **盘口(Order Book)接口**：最大同时请求3000个产品 |
| 全部A股  | **最新成交价(逐笔Tick)接口**：最大同时请求3000个产品<br /> **盘口(Order Book)接口**：最大同时请求3000个产品 |
| 全部美股 | **最新成交价(逐笔Tick)接口**：最大同时请求3000个产品<br /> **盘口(Order Book)接口**：最大同时请求3000个产品 |

**注意事项**
- 请根据这些限制合理规划您的WebSocket连接和请求策略，避免不必要的服务中断。
- 这些限制旨在确保所有用户都能公平且高效地访问服务，同时保护后端服务不受不当负荷的影响。
- 遇到任何问题或需要进一步的帮助时，请及时联系技术支持团队。
