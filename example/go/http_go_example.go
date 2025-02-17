package main

import (
	"fmt"
	"io/ioutil"
	"log"
	"net/http"
)

func http_example() {

	/*
		将如下JSON进行url的encode，复制到http的查询字符串的query字段里
		{"trace" : "go_http_test1","data" : {"code" : "700.HK","kline_type" : 1,"kline_timestamp_end" : 0,"query_kline_num" : 2,"adjust_type": 0}}

		特别注意：
		github: https://github.com/alltick/realtime-forex-crypto-stock-tick-finance-websocket-api
		token申请：https://alltick.co
		把下面url中的testtoken替换为您自己的token
		外汇，加密货币（数字币），贵金属的api址：
		https://quote.alltick.io/quote-b-api
		股票api地址:
		https://quote.alltick.io/quote-stock-b-api
	*/
	url := "https://quote.alltick.io/quote-stock-b-api/kline"
	log.Println("请求内容：", url)

	req, err := http.NewRequest("GET", url, nil)
	if err != nil {
		fmt.Println("Error creating request:", err)
		return
	}

	q := req.URL.Query()
	token := "testtoken"
	q.Add("token", token)
	queryStr := `{"trace":"1111111111111111111111111","data":{"code":"AAPL.US","kline_type":1,"kline_timestamp_end":0,"query_kline_num":10,"adjust_type":0}}`
	q.Add("query", queryStr)
	req.URL.RawQuery = q.Encode()
	// 发送请求
	resp, err := http.DefaultClient.Do(req)
	if err != nil {
		fmt.Println("Error sending request:", err)
		return
	}
	defer resp.Body.Close()

	body2, err := ioutil.ReadAll(resp.Body)

	if err != nil {

		log.Println("读取响应失败：", err)

		return

	}

	log.Println("响应内容：", string(body2))

}
