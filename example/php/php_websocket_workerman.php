<?php
require_once __DIR__ . '/vendor/autoload.php';

use Workerman\Protocols\Ws;
use Workerman\Worker;
use Workerman\Connection\AsyncTcpConnection;

// 特别注意：
// github: https://github.com/alltick/free-quote
// token申请：https://alltick.co
// 把下面url中的testtoken替换为您自己的token
// 外汇，加密货币（数字币），贵金属的api址：
// wss://quote.tradeswitcher.com/quote-b-ws-api
// 股票api地址:
// wss://quote.tradeswitcher.com/quote-stock-b-ws-api

$worker = new Worker();
// 进程启动时
$worker->onWorkerStart = function()
{
    // 以websocket协议连接远程websocket服务器
    $ws_connection = new AsyncTcpConnection("ws://quote.tradeswitcher.com/quote-stock-b-ws-api?token=testtoken");
    // 每隔55秒向服务端发送一个opcode为0x9的websocket心跳
    $ws_connection->websocketPingInterval = 10;
    $ws_connection->websocketType = Ws::BINARY_TYPE_BLOB; // BINARY_TYPE_BLOB为文本 BINARY_TYPE_ARRAYBUFFER为二进制
    // 当TCP完成三次握手后
    $ws_connection->onConnect = function($connection){
        echo "tcp connected\n";
		// 发送订阅请求
		$connection->send('{"cmd_id":22002,"seq_id":123,"trace":"3baaa938-f92c-4a74-a228-fd49d5e2f8bc-1678419657806","data":{"symbol_list":[{"code":"700.HK","depth_level":5,},{"code":"AAPL.US","depth_level":5,}]}}');
    };
    // 当websocket完成握手后
    $ws_connection->onWebSocketConnect = function(AsyncTcpConnection $con, $response) {
        echo $response;
    };
    // 远程websocket服务器发来消息时
    $ws_connection->onMessage = function($connection, $data){
        echo "recv: $data\n";
    };
    // 连接上发生错误时，一般是连接远程websocket服务器失败错误
    $ws_connection->onError = function($connection, $code, $msg){
        echo "error: $msg\n";
    };
    // 当连接远程websocket服务器的连接断开时
    $ws_connection->onClose = function($connection){
        echo "connection closed and try to reconnect\n";
        // 如果连接断开，1秒后重连
        $connection->reConnect(1);
    };
    // 设置好以上各种回调后，执行连接操作
    $ws_connection->connect();
	
	
};
Worker::runAll();
