
package main

import (
	"encoding/json"
	"github.com/google/uuid"
	"github.com/gorilla/websocket"
	"log"
	"time"
)

type Symbol struct {
	Code       string `json:"code"`
	DepthLevel int    `json:"depth_level"`
}

type Data struct {
	SymbolList []Symbol `json:"symbol_list"`
}

type Request struct {
	CmdID  int    `json:"cmd_id"`
	SeqID  int    `json:"seq_id"`
	Trace  string `json:"trace"`
	Data   Data   `json:"data"`
}

/*
	特别注意：
	github: https://github.com/alltick/free-quote
	token申请：https://alltick.co
	把下面url中的testtoken替换为您自己的token
	外汇，加密货币（数字币），贵金属的api址：
	wss://quote.tradeswitcher.com/quote-b-ws-api
	股票api地址:
	wss://quote.tradeswitcher.com/quote-stock-b-ws-api
*/
const(
	url ="wss://quote.tradeswitcher.com/quote-b-ws-api?token=testtoken"
)

func websocket_example() {

	log.Println("Connecting to server at", url)

    c, _, err := websocket.DefaultDialer.Dial(url, nil)
    if err != nil {
        log.Fatal("dial:", err)
    }
    defer c.Close()

	//定时10秒发一次心跳
    go func() {
    	for range time.NewTicker(10*time.Second).C{
			req := Request{
				CmdID: 22000,
				SeqID: 123,
				Trace: "3380a7a-3e1f-c3a5-5ee3-9e5be0ec8c241692805462",
				Data:  Data{},
			}
			messageBytes, err := json.Marshal(req)
			if err != nil {
				log.Println("json.Marshal error：", err)
				return
			}
			log.Println("req data：", string(messageBytes))

			err = c.WriteMessage(websocket.TextMessage, messageBytes)
			if err != nil {
				log.Println("write:", err)
			}
		}
	}()

	req := Request{
		CmdID: 22002,
		SeqID: 123,
		Trace: uuid.New().String(),
		Data:  Data{SymbolList: []Symbol{
			{"GOLD",5},
			{"AAPL.US",5},
			{"700.HK",5},
			{"USDJPY",5},
		}},
	}
	messageBytes, err := json.Marshal(req)
	if err != nil {
		log.Println("json.Marshal error：", err)
		return
	}
	log.Println("req data：", string(messageBytes))

    err = c.WriteMessage(websocket.TextMessage, messageBytes)
    if err != nil {
        log.Println("write:", err)
    }

    req.CmdID = 22004
	messageBytes, err = json.Marshal(req)
	if err != nil {
		log.Println("json.Marshal error：", err)
		return
	}
	log.Println("req data：", string(messageBytes))

	err = c.WriteMessage(websocket.TextMessage, messageBytes)
	if err != nil {
		log.Println("write:", err)
	}

	rece_count := 0
	for{
		_, message, err := c.ReadMessage()

		if err != nil {
			log.Println("read:", err)
			break
		} else {
			log.Println("Received message:", string(message))
		}

		rece_count++
		if rece_count % 10000 == 0 {
			log.Println("count:", rece_count, " Received message:", string(message))
		}
	}


}

