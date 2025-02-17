import json
import time
import threading
import websocket    # pip install websocket-client

'''
# Special Note:
# GitHub: https://github.com/alltick/realtime-forex-crypto-stock-tick-finance-websocket-api
# Token Application: https://alltick.co
# Replace "testtoken" in the URL below with your own token
# API addresses for forex, cryptocurrencies, and precious metals:
# wss://quote.alltick.io/quote-b-ws-api
# Stock API address:
# wss://quote.alltick.io/quote-stock-b-ws-api
'''

class Feed(object):

    def __init__(self):
        self.url = 'wss://quote.alltick.io/quote-stock-b-ws-api?token=testtoken'  # Enter your websocket URL here
        self.ws = None

    def on_open(self, ws):
        """
        Callback object which is called at opening websocket.
        1 argument:
        @ ws: the WebSocketApp object
        """
        print('A new WebSocketApp is opened!')

        # Start subscribing (an example)
        sub_param = {
            "cmd_id": 22002,
            "seq_id": 123,
            "trace":"3baaa938-f92c-4a74-a228-fd49d5e2f8bc-1678419657806",
            "data":{
                "symbol_list":[
                    {
                        "code": "700.HK",
                        "depth_level": 5,
                    },
                    {
                        "code": "UNH.US",
                        "depth_level": 5,
                    }
                ]
            }
        }

        # If you want to run for a long time, you need to modify the code to send heartbeats periodically to avoid disconnection, please refer to the API documentation for details
        sub_str = json.dumps(sub_param)
        ws.send(sub_str)
        print("depth quote are subscribed!")

    def on_data(self, ws, string, type, continue_flag):
        """
        4 arguments.
        The 1st argument is this class object.
        The 2nd argument is utf-8 string which we get from the server.
        The 3rd argument is data type. ABNF.OPCODE_TEXT or ABNF.OPCODE_BINARY will be came.
        The 4th argument is continue flag. If 0, the data continue
        """

    def on_message(self, ws, message):
        """
        Callback object which is called when received data.
        2 arguments:
        @ ws: the WebSocketApp object
        @ message: utf-8 data received from the server
        """
        # Parse the received message
        result = eval(message)
        print(result)

    def on_error(self, ws, error):
        """
        Callback object which is called when got an error.
        2 arguments:
        @ ws: the WebSocketApp object
        @ error: exception object
        """
        print(error)

    def on_close(self, ws, close_status_code, close_msg):
        """
        Callback object which is called when the connection is closed.
        2 arguments:
        @ ws: the WebSocketApp object
        @ close_status_code
        @ close_msg
        """
        print('The connection is closed!')

    def start(self):
        self.ws = websocket.WebSocketApp(
            self.url,
            on_open=self.on_open,
            on_message=self.on_message,
            on_data=self.on_data,
            on_error=self.on_error,
            on_close=self.on_close,
        )
        threading.Thread(target=self.thread_heartbeat).start()
        self.ws.run_forever()
    
    def thread_heartbeat(self):
        while True:
            time.sleep(10)  # 每 10 秒发送一次心跳
            if self.ws.sock and self.ws.sock.connected:
                heartbeat = {
                    "cmd_id":22000,
                    "seq_id":123,
                    "trace":"asdfsdfa",
                    "data":{
                    }
                }
                self.ws.send(heartbeat)  # 发送心跳消息
                print("Sent heartbeat")


if __name__ == "__main__":
    feed = Feed()
    feed.start()
