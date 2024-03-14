package main

import (
	"fmt"
	"log"
	"strings"
	"io/ioutil"
	"net/http"
)

func http_example() {

	/*
		将如下JSON进行url的encode，复制到http的查询字符串的query字段里
		{"trace" : "go_http_test1","data" : {"code" : "700.HK","kline_type" : 1,"kline_timestamp_end" : 0,"query_kline_num" : 2,"adjust_type": 0}}
		
		特别注意：
		github: https://github.com/alltick/free-quote
		token申请：https://alltick.co
		把下面url中的testtoken替换为您自己的token
		外汇，加密货币（数字币），贵金属的api址：
		https://quote.tradeswitcher.com/quote-b-api
		股票api地址:
		https://quote.tradeswitcher.com/quote-stock-b-api
	*/
	url := "https://quote.tradeswitcher.com/quote-stock-b-api/batch-kline?token=testtoken"
	log.Println("请求内容：", url)
	// 创建一个http.Client对象
	client := &http.Client{}

	body := strings.NewReader(`{"trace": "3380a7a-3e1f-c3a5-5ee3-9e5be0ec8c241692805461","data": {"data_list": [
{"code": "700.HK","kline_type": 1,"kline_timestamp_end": 0,"query_kline_num": 1000,"adjust_type": 0},
{"code": "USDJPY","kline_type": 1,"kline_timestamp_end": 0,"query_kline_num": 1000,"adjust_type": 0},
{"code": "AAPL.US","kline_type": 1,"kline_timestamp_end": 0,"query_kline_num": 1000,"adjust_type": 0},
{"code": "GOLD","kline_type": 1,"kline_timestamp_end": 0,"query_kline_num": 1000,"adjust_type": 0}
]}}`) // 请求body

	req, err := http.NewRequest("GET", url, body)
	if err != nil {
		fmt.Println("Error creating request:", err)
		return
	}

	// 发送请求
	resp, err := client.Do(req)
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

	log.Println("响应内容：", len(body2))

}
