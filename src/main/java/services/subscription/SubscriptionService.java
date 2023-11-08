package services.subscription;

import javax.jws.WebMethod;
import javax.jws.WebService;

@WebService
public interface SubscriptionService {
    @WebMethod
    public String foobar();
}
