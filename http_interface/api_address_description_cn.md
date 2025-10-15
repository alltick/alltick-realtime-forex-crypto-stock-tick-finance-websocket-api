> [English](./api_address_description.md) | [中文](./api_address_description_cn.md)

# API地址说明

## 股票HTTP接口API地址
/quote-stock-b-api    股票查询API<br/>

查询API为https协议，完整的url为：<br/>https://quote.alltick.co/quote-stock-b-api<br/>

每发送一次查询请求时，需要带上方法名和token信息<br/>

单产品请求K线示例：<br/>
https://quote.alltick.co/quote-stock-b-api/kline?token=你的token&query=queryData<br/>

批产品请求K线示例：<br/>
https://quote.alltick.co/quote-stock-b-api/batch-kline?token=你的token<br/>
注意：批产品请求K线时，请求参数放在body中

请求最新成交价示例：<br/>
https://quote.alltick.co/quote-stock-b-api/trade-tick?token=你的token&query=queryData<br/>

请求最新盘口示例：<br/>
https://quote.alltick.co/quote-stock-b-api/depth-tick?token=你的token&query=queryData<br/>



具体调用方式，请查看http接口列表<br/>

## 外汇,加密货币(数字币),商品(贵金属) HTTP接口API地址
/quote-b-api 外汇,加密货币(数字币),商品(贵金属)查询API<br/>

查询API为https协议，完整的url为：<br/>https://quote.alltick.co/quote-b-api<br/>

每发送一次查询请求时，需要带上方法名和token信息<br/>

单产品请求K线示例：<br/>
https://quote.alltick.co/quote-b-api/kline?token=你的token&query=queryData<br/>

批产品请求K线示例：<br/>
https://quote.alltick.io/quote-b-api/batch-kline?token=你的token<br/>
注意：批产品请求K线时，请求参数放在body中

请求最新成交价示例：<br/>
https://quote.alltick.co/quote-b-api/trade-tick?token=你的token&query=queryData<br/>

请求最新盘口示例：<br/>
https://quote.alltick.co/quote-b-api/depth-tick?token=你的token&query=queryData<br/>

具体调用方式，请查看http接口列表<br/>
