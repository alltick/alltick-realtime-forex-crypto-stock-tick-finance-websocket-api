> [English](./interface_limitation.md) | [中文](./interface_limitation_cn.md)

# http接口限制

## http接口限制1-IP类限制(这里写的免费试用套餐的限制，付费后会根据套餐调整相应的限制)
相同IP的多次请求，按接口确定具体累计次数限制

- /kline 每10秒只能请求1次
- /depth-tick 每秒只能请求1次
- /trade-tick 每秒只能请求1次
- /batch-kline 每10秒只能请求1次
### 举例:
- IP为A，调用/kline接口查询K线，14:03:01请求了1次，并且它也在这一分钟调用了/trade-tick接口查询成交报价1次，后台服务都能正常提供服务
- IP为A，调用/kline接口查询K线，14:03:01请求了2次，前1次后台服务都能正常提供服务，最后1次给出错误回应

## http接口限制2-连接数限制(这里写的免费试用套餐的限制，付费后会根据套餐调整相应的限制)
为避免过多请求对于后台服务造成过大压力，stock-api的最大连接数限制在100个，视后续服务运行表现再进行调节，超过限制的请求，直接会断开连接

## http接口限制3-K线查询限制(这里写的免费试用套餐的限制，付费后会根据套餐调整相应的限制)
一次只能查询1个code的K线，一次最多只能查询1000根K线，对于查询超过1000根以上的，则按1000根来进行查询

## http接口限制4-报价查询限制(这里写的免费试用套餐的限制，付费后会根据套餐调整相应的限制)
一次查询，最多只能查询5个code，对于查询超过5个以上的，则按5个来查询
