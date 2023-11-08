package services.subscription;

import javax.jws.WebService;

@WebService(endpointInterface = "services.subscription.SubscriptionServiceImpl")
public class SubscriptionServiceImpl implements SubscriptionService {
    public String foobar() {
        return "Foobar from java servlet";
    }
}
