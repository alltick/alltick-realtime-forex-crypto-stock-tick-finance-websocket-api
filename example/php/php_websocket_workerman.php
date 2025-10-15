<?php
require_once __DIR__ . '/vendor/autoload.php';

use Workerman\Protocols\Ws;
use Workerman\Worker;
use Workerman\Connection\AsyncTcpConnection;

// Special Note:
// GitHub: https://github.com/alltick/realtime-forex-crypto-stock-tick-finance-websocket-api
// Token Application: https://alltick.co
// Replace "testtoken" in the URL below with your own token
// API addresses for forex, cryptocurrencies, and precious metals:
// wss://quote.alltick.co/quote-b-ws-api
// Stock API address:
// wss://quote.alltick.co/quote-stock-b-ws-api

$worker = new Worker();
// When the process starts
$worker->onWorkerStart = function()
{
    // Connect to remote websocket server using the websocket protocol
    $ws_connection = new AsyncTcpConnection("ws://quote.alltick.co/quote-stock-b-ws-api?token=testtoken");
    // Send a websocket heartbeat opcode (0x9) to the server every 55 seconds
    $ws_connection->websocketPingInterval = 10;
    $ws_connection->websocketType = Ws::BINARY_TYPE_BLOB; // BINARY_TYPE_BLOB for text, BINARY_TYPE_ARRAYBUFFER for binary
    // After the TCP handshake is completed
    $ws_connection->onConnect = function($connection){
        echo "TCP connected\n";
        // Send subscription request
        $connection->send('{"cmd_id":22002,"seq_id":123,"trace":"3baaa938-f92c-4a74-a228-fd49d5e2f8bc-1678419657806","data":{"symbol_list":[{"code":"700.HK","depth_level":5},{"code":"AAPL.US","depth_level":5}]}}');

        // 开始定时发送心跳
        $timerId = Timer::add(10, function () use ($connection) {
            $heartbeat = json_encode([
                "cmd_id" => 22000,
                "seq_id" => 123,
                "trace" => "asdfsdfa",
                "data" => []
            ]);
            $connection->send($heartbeat);
            echo "Sent heartbeat: ". $heartbeat. "\n";
        });
    };
    // After the websocket handshake is completed
    $ws_connection->onWebSocketConnect = function(AsyncTcpConnection $con, $response) {
        echo $response;
    };
    // When a message is received from the remote websocket server
    $ws_connection->onMessage = function($connection, $data){
        echo "Received: $data\n";
    };
    // When an error occurs, usually due to failure to connect to the remote websocket server
    $ws_connection->onError = function($connection, $code, $msg){
        echo "Error: $msg\n";
    };
    // When the connection to the remote websocket server is closed
    $ws_connection->onClose = function($connection){
        echo "Connection closed and trying to reconnect\n";
        if ($timerId!== null) {
            Timer::del($timerId);
        }
        // If the connection is closed, reconnect after 1 second
        $connection->reConnect(1);

    };
    // After setting up all the callbacks above, initiate the connection
    $ws_connection->connect();
};
Worker::runAll();
?>
