<?php

// 特别注意：
// github: https://github.com/alltick/free-quote
// token申请：https://alltick.co
// 把下面url中的testtoken替换为您自己的token
// 外汇，加密货币（数字币），贵金属的api址：
// https://quote.tradeswitcher.com/quote-b-ws-api
// 股票api地址:
// https://quote.tradeswitcher.com/quote-stock-b-ws-api


$params = '{"trace":"c5e6d492-baed-40bf-9b27-93119d2d4a0d-16920159919524472","data":{"data_list":[{"code":"5.HK","kline_type":"8","kline_timestamp_end":"0","query_kline_num":"1","adjust_type":"0"},{"code":"9988.HK","kline_type":"8","kline_timestamp_end":"0","query_kline_num":"1","adjust_type":"0"},{"code":"3690.HK","kline_type":"8","kline_timestamp_end":"0","query_kline_num":"1","adjust_type":"0"},{"code":"700.HK","kline_type":"8","kline_timestamp_end":"0","query_kline_num":"1","adjust_type":"0"},{"code":"2601.HK","kline_type":"8","kline_timestamp_end":"0","query_kline_num":"1","adjust_type":"0"}]}}';

$url = 'https://quote.tradeswitcher.com/quote-stock-b-api/batch-kline?token=testtoken';
$method = 'GET';


$opts = array(CURLOPT_TIMEOUT => 10, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false);

/* 根据请求类型设置特定参数 */
switch (strtoupper($method)) {
case 'GET':
    $opts[CURLOPT_URL] = $url;
    $opts[CURLOPT_CUSTOMREQUEST] = 'GET';
    $opts[CURLOPT_POSTFIELDS] = $params;

    break;
case 'POST':
    //判断是否传输文件
    $params = http_build_query($params);
    $opts[CURLOPT_URL] = $url;
    $opts[CURLOPT_POST] = 1;
    $opts[CURLOPT_POSTFIELDS] = $params;

    break;
default:
}

/* 初始化并执行curl请求 */
$ch = curl_init();
curl_setopt_array($ch, $opts);
$data = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    $data = null;
}

echo $data;
