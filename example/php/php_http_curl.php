<?php

// Special Note:
// GitHub: https://github.com/alltick/realtime-forex-crypto-stock-tick-finance-websocket-api
// Token Application: https://alltick.co
// Replace "testtoken" in the URL below with your own token
// API addresses for forex, cryptocurrencies, and precious metals:
// https://quote.tradeswitcher.com/quote-b-ws-api
// Stock API address:
// https://quote.tradeswitcher.com/quote-stock-b-ws-api

$params = '{"trace":"c5e6d492-baed-40bf-9b27-93119d2d4a0d-16920159919524472","data":{"data_list":[{"code":"5.HK","kline_type":"8","kline_timestamp_end":"0","query_kline_num":"1","adjust_type":"0"},{"code":"9988.HK","kline_type":"8","kline_timestamp_end":"0","query_kline_num":"1","adjust_type":"0"},{"code":"3690.HK","kline_type":"8","kline_timestamp_end":"0","query_kline_num":"1","adjust_type":"0"},{"code":"700.HK","kline_type":"8","kline_timestamp_end":"0","query_kline_num":"1","adjust_type":"0"},{"code":"2601.HK","kline_type":"8","kline_timestamp_end":"0","query_kline_num":"1","adjust_type":"0"}]}}';

$url = 'https://quote.tradeswitcher.com/quote-stock-b-api/batch-kline?token=testtoken';
$method = 'GET';

$opts = array(CURLOPT_TIMEOUT => 10, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false);

/* Set specific parameters based on request type */
switch (strtoupper($method)) {
    case 'GET':
        $opts[CURLOPT_URL] = $url;
        $opts[CURLOPT_CUSTOMREQUEST] = 'GET';
        $opts[CURLOPT_POSTFIELDS] = $params;
        break;
    case 'POST':
        // Check if file transfer is required
        $params = http_build_query($params);
        $opts[CURLOPT_URL] = $url;
        $opts[CURLOPT_POST] = 1;
        $opts[CURLOPT_POSTFIELDS] = $params;
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
