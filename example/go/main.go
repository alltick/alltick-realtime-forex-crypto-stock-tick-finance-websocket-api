package main

import "time"

func main(){
	go http_example()
	go websocket_example()
	time.Sleep(time.Second*1000000)
}