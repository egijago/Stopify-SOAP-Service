import services.payment.PaymentServiceImpl;
import services.payment.PaymentServiceProxy;
import services.subscription.SubscriptionServiceImpl;

import services.subscription.SubscriptionServiceProxy;
import utils.Config;
import javax.xml.ws.Endpoint;

public class Main {
    public static void main(String[] args) {
        final Config config = Config.getInstance();
        final String SERVER_HOST = config.get("server.host");
        final String SERVER_PORT = config.get("server.port");

        final String PAYMENT_SERV_PATH = "/ws/payment";
        final String SUBSCRIPTION_SERV_PATH = "/ws/subscription";
        try {
            Endpoint.publish(SERVER_HOST + ":" + SERVER_PORT + PAYMENT_SERV_PATH,
                    new PaymentServiceProxy()
            );
            Endpoint.publish(SERVER_HOST + ":" + SERVER_PORT + SUBSCRIPTION_SERV_PATH,
                    new SubscriptionServiceProxy()
            );
            System.out.println("Server started at " + SERVER_HOST + ":" + SERVER_PORT );
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
