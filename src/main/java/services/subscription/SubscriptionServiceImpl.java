package services.subscription;

import javax.jws.WebService;

@WebService(endpointInterface = "services.subscription.SubscriptionServiceImpl")
public class SubscriptionServiceImpl implements SubscriptionService {
    public String foobar() {
        try {
            SubscriptionRepository sr = SubscriptionRepository.getInstance();
            SubscriptionModel model = sr.fetchAll().get(0);
            System.out.println(model.getIdArtist());
        } catch (Exception e) {
            e.printStackTrace();
        }
        return "Foobar from java servlet";
    }
}
