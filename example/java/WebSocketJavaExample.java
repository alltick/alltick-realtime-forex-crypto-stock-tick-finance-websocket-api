import java.io.IOException;
import java.net.URI;
import java.net.URISyntaxException;
import javax.websocket.*;
import java.util.Timer;
import java.util.TimerTask;

// Special Note:
// GitHub: https://github.com/alltick/realtime-forex-crypto-stock-tick-finance-websocket-api
// Token Application: https://alltick.co
// Replace "testtoken" in the URL below with your own token
// API addresses for forex, cryptocurrencies, and precious metals:
// wss://quote.alltick.io/quote-b-ws-api
// Stock API address:
// wss://quote.alltick.io/quote-stock-b-ws-api

@ClientEndpoint
public class WebSocketJavaExample {

    private Session session;
    private Timer timer;

    @OnOpen
    public void onOpen(Session session) {
        System.out.println("Connected to server");
        this.session = session;
        startHeartbeat();
    }

    @OnMessage
    public void onMessage(String message) {
        System.out.println("Received message: " + message);
    }

    @OnClose
    public void onClose(Session session, CloseReason closeReason) {
        System.out.println("Disconnected from server");
        stopHeartbeat();
    }

    @OnError
    public void onError(Throwable throwable) {
        System.err.println("Error: " + throwable.getMessage());
    }

    public void sendMessage(String message) throws Exception {
        this.session.getBasicRemote().sendText(message);
    }

    private void startHeartbeat() {
        this.timer = new Timer();
        timer.scheduleAtFixedRate(new TimerTask() {
            @Override
            public void run() {
                try {
                    if (session.isOpen()) {
                        String heartbeat = "{\"cmd_id\":22000,\"seq_id\":123,\"trace\":\"asdfsdfa\",\"data\":{}}";
                        session.getBasicRemote().sendText(heartbeat);
                        System.out.println("Sent heartbeat");
                    } else {
                        stopHeartbeat();
                    }
                } catch (IOException e) {
                    e.printStackTrace();
                    stopHeartbeat();
                }
            }
        }, 0, 10000); // 每 10 秒发送一次心跳
    }


    private void stopHeartbeat() {
        if (this.timer!= null) {
            timer.cancel();
            this.timer = null;
        }
    }

    public static void main(String[] args) throws Exception, URISyntaxException, DeploymentException, IOException, IllegalArgumentException, SecurityException, NoSuchMethodException, IllegalAccessException, InvocationTargetException, InstantiationException {
        // Special Note:
        // GitHub: https://github.com/alltick/realtime-forex-crypto-stock-tick-finance-websocket-api
        // Token Application: https://alltick.co
        // Replace "testtoken" in the URL below with your own token
        // API addresses for forex, cryptocurrencies, and precious metals:
        // wss://quote.alltick.io/quote-b-ws-api
        // Stock API address:
        // wss://quote.alltick.io/quote-stock-b-ws-api

        WebSocketContainer container = ContainerProvider.getWebSocketContainer();
        URI uri = new URI("wss://quote.alltick.io/quote-stock-b-ws-api?token=testtoken"); // Replace with your websocket endpoint URL

        WebSocketJavaExample client = new WebSocketJavaExample();

        container.connectToServer(client, uri);

        // Send messages to the server using the sendMessage() method
        // If you want to run for a long time, in addition to sending subscriptions, you also need to modify the code to send heartbeats regularly to prevent disconnection. Refer to the interface documentation for details
        client.sendMessage("{\"cmd_id\": 22002, \"seq_id\": 123,\"trace\":\"3baaa938-f92c-4a74-a228-fd49d5e2f8bc-1678419657806\",\"data\":{\"symbol_list\":[{\"code\": \"700.HK\",\"depth_level\": 5},{\"code\": \"UNH.US\",\"depth_level\": 5}]}}");

        // Wait for the client to be disconnected from the server (or until the user presses Enter)
        System.in.read(); // Wait for user input before closing the program
    }
}
