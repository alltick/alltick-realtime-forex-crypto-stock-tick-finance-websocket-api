
import java.io.BufferedReader;

import java.io.InputStreamReader;

import java.net.HttpURLConnection;

import java.net.URL;



public class HttpJavaExample {

    public static void main(String[] args) {

        try {

            /*
            将如下JSON进行url的encode，复制到http的查询字符串的query字段里
            {"trace" : "java_http_test1","data" : {"code" : "700.HK","kline_type" : 1,"kline_timestamp_end" : 0,"query_kline_num" : 2,"adjust_type": 0}}
			特别注意：
			github: https://github.com/alltick/free-quote
			token申请：https://alltick.co
			把下面url中的testtoken替换为您自己的token
			外汇，加密货币（数字币），贵金属的api址：
			https://quote.tradeswitcher.com/quote-b-api
			股票api地址:
			https://quote.tradeswitcher.com/quote-stock-b-api
            */
            String url = "http://quote.tradeswitcher.com/quote-stock-b-api/kline?token=testtoken&query=%7B%22trace%22%20%3A%20%22java_http_test1%22%2C%22data%22%20%3A%20%7B%22code%22%20%3A%20%22700.HK%22%2C%22kline_type%22%20%3A%201%2C%22kline_timestamp_end%22%20%3A%200%2C%22query_kline_num%22%20%3A%202%2C%22adjust_type%22%3A%200%7D%7D";

            URL obj = new URL(url);

            HttpURLConnection con = (HttpURLConnection) obj.openConnection();

            con.setRequestMethod("GET");

            int responseCode = con.getResponseCode();

            System.out.println("Response Code: " + responseCode);



            BufferedReader in = new BufferedReader(new InputStreamReader(con.getInputStream()));

            String inputLine;

            StringBuffer response = new StringBuffer();



            while ((inputLine = in.readLine()) != null) {

                response.append(inputLine);

            }

            in.close();



            System.out.println(response.toString());

        } catch (Exception e) {

            e.printStackTrace();

        }

    }

}

