import json
import websocket    # pip install websocket-client

'''
# 特别注意：
# github: https://github.com/alltick/free-quote
# token申请：https://alltick.co
# 把下面url中的testtoken替换为您自己的token
# 外汇，加密货币（数字币），贵金属的api址：
# wss://quote.tradeswitcher.com/quote-b-ws-api
# 股票api地址:
# wss://quote.tradeswitcher.com/quote-stock-b-ws-api
'''

class Feed(object):

    def __init__(self):
        self.url = 'wss://quote.tradeswitcher.com/quote-stock-b-ws-api?token=testtoken'  # 这里输入websocket的url
        self.ws = None

    def on_open(self, ws):
        """
        Callback object which is called at opening websocket.
        1 argument:
        @ ws: the WebSocketApp object
        """
        print('A new WebSocketApp is opened!')

        # 开始订阅（举个例子）
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
        
        #如果希望长时间运行，除了需要发送订阅之外，还需要修改代码，定时发送心跳，避免连接断开，具体查看接口文档
        sub_str = json.dumps(sub_param)
        ws.send(sub_str)
        print("depth quote are subscribed!")

    def on_data(self, ws, string, type, continue_flag):
        """
        4 argument.
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
        # 对收到的message进行解析
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
        self.ws.run_forever()


if __name__ == "__main__":
    feed = Feed()
    feed.start()
