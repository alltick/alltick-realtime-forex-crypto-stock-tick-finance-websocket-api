> [English](./api_address_description.md) | [中文](./api_address_description_cn.md)

# API Address Description

## Stock HTTP Interface API Address
/quote-stock-b-api    Stock Query API<br/>

The query API uses HTTPS protocol, the complete URL is:<br/>https://quote.alltick.co/quote-stock-b-api<br/>

Each time a query request is sent, the method name and token information need to be provided<br/>

Single product request K-line example:<br/>
https://quote.alltick.co/quote-stock-b-api/kline?token=yourToken&query=queryData<br/>

Batch product request K-line example:<br/>
https://quote.alltick.co/quote-stock-b-api/batch-kline?token=yourToken<br/>
Note: When making batch product requests for K-line, the request parameters should be placed in the body.<br/>

Request for latest transaction price example:<br/>
https://quote.alltick.co/quote-stock-b-api/trade-tick?token=yourToken&query=queryData<br/>

Request for latest market depth example:<br/>
https://quote.alltick.co/quote-stock-b-api/depth-tick?token=yourToken&query=queryData<br/>

For specific calling methods, please refer to the HTTP interface list<br/>

## Forex, Cryptocurrency (Digital Currency), Commodity (Precious Metal) HTTP Interface API Address
/quote-b-api Forex, Cryptocurrency (Digital Currency), Commodity (Precious Metal) Query API<br/>

The query API uses HTTPS protocol, the complete URL is:<br/>https://quote.alltick.co/quote-b-api<br/>

Each time a query request is sent, the method name and token information need to be provided<br/>

Single product request K-line example:
https://quote.alltick.co/quote-b-api/kline?token=yourToken&query=queryData

Batch product request K-line example:
https://quote.alltick.co/quote-b-api/batch-kline?token=yourToken
Note: When making batch product requests for K-line, the request parameters should be placed in the body.<br/>

Request for latest transaction price example:
https://quote.alltick.co/quote-b-api/trade-tick?token=yourToken&query=queryData

Request for latest market depth example:
https://quote.alltick.co/quote-b-api/depth-tick?token=yourToken&query=queryData

For specific calling methods, please refer to the HTTP interface list<br/>
