package cores;

import com.sun.net.httpserver.HttpExchange;
import com.sun.xml.ws.handler.SOAPMessageContextImpl;
import exceptions.InvalidAPIKeyException;
import exceptions.NoApiKeyException;
import services.logging.LoggingModel;
import services.logging.LoggingRepository;
import utils.Config;

import javax.annotation.Resource;
import javax.servlet.http.HttpServletRequest;
import javax.xml.soap.SOAPMessage;
import javax.xml.ws.WebServiceContext;
import javax.xml.ws.handler.MessageContext;
import javax.xml.ws.handler.soap.SOAPMessageContext;
import java.net.InetSocketAddress;
import java.sql.Timestamp;
import java.util.List;
import java.util.Map;

//import javax.annotation.Resource;
//import javax.servlet.http.HttpServletRequest;
//import javax.xml.ws.WebServiceContext;
//import javax.xml.ws.handler.MessageContext;
//import javax.xml.ws.spi.http.HttpExchange;
//import java.sql.Timestamp;
public abstract class Proxy {
    final static String NODE_API_KEY = Config.getInstance().get("node_api_key");
    final static String PHP_API_KEY = Config.getInstance().get("php_api_key");

    @Resource
    private WebServiceContext webServiceContext;

    protected void log(Object ...params) {
        try {
            MessageContext messageContext = webServiceContext.getMessageContext();

            Map<Object, Object> requestHeader = (Map) messageContext.get(messageContext.HTTP_REQUEST_HEADERS);
            String apiKey = ((List<String>) requestHeader.get("api-key")).get(0);

            String clientName = getClientName(apiKey);

            HttpExchange httpExchange = (HttpExchange) messageContext.get("com.sun.xml.ws.http.exchange");
            InetSocketAddress remoteAddress = httpExchange.getRemoteAddress();
            String IP = remoteAddress.getAddress().toString().substring(1);

            String endPoint = messageContext.get("javax.xml.ws.wsdl.operation").toString();

            String description = "";
            for (int i = 0; i < params.length; i++) {
                description += "arg " + i +  " : " + params[i] + ";";
            }

            Timestamp timestamp = new Timestamp(System.currentTimeMillis());
            System.out.println(clientName + " client just accessed " + endPoint + " with args " + description + " from " + IP + " at " + timestamp);
            LoggingModel log = new LoggingModel(-1, apiKey, IP, endPoint, description, timestamp);

            LoggingRepository.getInstance().insert(log);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public void validate() throws Exception {
        String apiKey = getApiKey();
        if (apiKey == null) {
            throw new NoApiKeyException();
        }
        if (!(apiKey.equals(NODE_API_KEY) || apiKey.equals(PHP_API_KEY))){
            throw new InvalidAPIKeyException();
        }
    }
    private String getClientName(String apiKey) {
        if (apiKey.equals(NODE_API_KEY)) {
            return "NODE";
        } else if (apiKey.equals(PHP_API_KEY)) {
            return "PHP";
        } else {
            return "UNKNOWN";
        }
    }
    public String getApiKey() {
        MessageContext messageContext = webServiceContext.getMessageContext();
        Map<Object, Object> requestHeader = (Map) messageContext.get(messageContext.HTTP_REQUEST_HEADERS);
        List<String> apiKeyList = (List<String>) requestHeader.get("api-key");
        if (apiKeyList == null) {
            return null;
        }
        return apiKeyList.get(0);
    }

}
