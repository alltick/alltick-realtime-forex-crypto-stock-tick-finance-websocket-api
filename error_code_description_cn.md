> [English](./error_code_description.md) | [中文](./error_code_description_cn.md)

# 错误码说明

| 错误码 | 错误内容                      | 含义 |
| ------ | ---------------------------- | ---------------------------- |
| 200    | ok                           | 成功 |
| 400    | request header param invalid | 请求JSON第一层参数错误<br/> 排查建议：<br/>1、检查JSON结构是否完整。<br/>2、确认所有必需字段已正确包含。<br/>3、验证data字段是否为有效的对象类型。<br/>4、核实trace等关键字段是否存在。|
| 400    | request data param invalid   | 请求JSON中data字段参数错误<br/> 排查建议：<br/>1、检查data字段是否为有效对象。<br/>2、确认data中所有必需字段已正确填写。<br/>3、对照具体接口文档，核实data字段内容。<br/>4、特别注意POST请求中，确保body体中JSON参数完整且正确。|
| 401    | token invalid                | token无效<br/> 可能由以下情况导致：<br/>1、Token格式不正确。<br/>2、Token账号过期了。|
| 402    | query invalid                | 请求的query参数错误<br/> 排查建议：<br/>1、检查GET请求的query参数。<br/>2、对query参数进行URL编码。<br/>3、确保参数格式符合接口要求。<br/>4、验证特殊字符是否正确转义。|
| 429    | rate limit                   | 超过套餐规定的请求频率<br/> 建议：<br/>1、优化请求频率和逻辑。<br/>2、考虑升级套餐，获取更高的请求频率。|
| 600    | code invalid                 | 请求code产品无效<br/> 排查建议：<br/>1、检查请求URL：<br/>仔细核对接口文档，股票类和外汇类贵金属类数据的请求URL是不同。<br/>2、检查产品code：<br/>对照产品列表，确保代码有效且准确：[产品列表](https://docs.google.com/spreadsheets/d/1avkeR1heZSj6gXIkDeBt8X3nv4EzJetw4yFuKjSDYtA/edit?gid=495387863#gid=495387863)|
| 601    | body empty                   | 请求消息体数据为空<br/> 排查建议：<br/>1、检查POST请求的消息体。<br/>2、确保body中包含完整的JSON参数。<br/>3、特别注意批量获取/batch-kline等接口。<br/>4、验证所有必需字段均已正确填写。|
| 603    | token level not enough       | 请求产品个数或者K线根数超过接口文档规定的限制<br/> 排查建议：<br/>1、检查产品数量：<br/>确认同时请求的产品数是否超过套餐限制。<br/>2、验证K线请求：<br/>核实K线根数是否符合接口规定。<br/>注意批量产品K线接口每次仅允许2根。|
| 604    | code unauthorized            | 您的token没有请求该code的权限|
| 605    | too many requests            | 一般是Http接口请求频率限制<br/>建议：<br/>1、优化请求频率和逻辑。<br/>2、考虑升级套餐，获取更高的请求频率。 |
| 606    | too many requests and connection will be closed            | 一般是Websocket接口请求频率限制<br/> 排查建议：<br/>1、检查Websocket连接数。<br/>确认是否超过套餐规定的最大连接数。<br/>2、控制请求频率<br/>确保多个Websocket请求时间隔至少3秒。|
