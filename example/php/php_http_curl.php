<?php

// Special Note:
// GitHub: https://github.com/alltick/realtime-forex-crypto-stock-tick-finance-websocket-api
// Token Application: https://alltick.co
// Replace "testtoken" in the URL below with your own token
// API addresses for forex, cryptocurrencies, and precious metals:
// https://quote.alltick.co/quote-b-ws-api
// Stock API address:
// https://quote.alltick.co/quote-stock-b-ws-api

$params = '{"trace":"1111111111111111111111111","data":{"code":"AAPL.US","kline_type":1,"kline_timestamp_end":0,"query_kline_num":10,"adjust_type":0}}';

$url = 'https://quote.alltick.co/quote-stock-b-api/kline?token=testtoken';
$method = 'GET';

$opts = array(CURLOPT_TIMEOUT => 10, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false);

/* Set specific parameters based on request type */
switch (strtoupper($method)) {
    case 'GET':
        $opts[CURLOPT_URL] = $url.'&query='.rawurlencode($params);
        $opts[CURLOPT_CUSTOMREQUEST] = 'GET';
        break;
    default:
}

/* Initialize and execute curl request */
$ch = curl_init();
curl_setopt_array($ch, $opts);
$data = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    $data = null;
}

echo $data;
?>
