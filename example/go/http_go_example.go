package main

import (
	"fmt"
	"io/ioutil"
	"log"
	"net/http"
	"strings"
)

func http_example() {

	/*
		Encode the following JSON into URL and copy it to the query field of the HTTP query string
		{"trace" : "go_http_test1","data" : {"code" : "700.HK","kline_type" : 1,"kline_timestamp_end" : 0,"query_kline_num" : 2,"adjust_type": 0}}

		Note:
		GitHub: https://github.com/alltick/free-quote
		Token application: https://alltick.co
		Replace "testtoken" in the URL below with your own token
		API addresses for forex, cryptocurrencies, and precious metals:
		https://quote.tradeswitcher.com/quote-b-api
		Stock API address:
		https://quote.tradeswitcher.com/quote-stock-b-api
	*/
	url := "https://quote.tradeswitcher.com/quote-stock-b-api/batch-kline?token=testtoken"
	log.Println("Request Content:", url)
	// Create an http.Client object
	client := &http.Client{}

	body := strings.NewReader(`{"trace": "3380a7a-3e1f-c3a5-5ee3-9e5be0ec8c241692805461","data": {"data_list": [
{"code": "700.HK","kline_type": 1,"kline_timestamp_end": 0,"query_kline_num": 1000,"adjust_type": 0},
{"code": "USDJPY","kline_type": 1,"kline_timestamp_end": 0,"query_kline_num": 1000,"adjust_type": 0},
{"code": "AAPL.US","kline_type": 1,"kline_timestamp_end": 0,"query_kline_num": 1000,"adjust_type": 0},
{"code": "GOLD","kline_type": 1,"kline_timestamp_end": 0,"query_kline_num": 1000,"adjust_type": 0}
]}}`) // Request body

	req, err := http.NewRequest("GET", url, body)
	if err != nil {
		fmt.Println("Error creating request:", err)
		return
	}

	// Send the request
	resp, err := client.Do(req)
	if err != nil {
		fmt.Println("Error sending request:", err)
		return
	}
	defer resp.Body.Close()

	body2, err := ioutil.ReadAll(resp.Body)

	if err != nil {

		log.Println("Failed to read response:", err)

		return

	}

	log.Println("Response Content:", len(body2))

}
