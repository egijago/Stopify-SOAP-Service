package services.payment;

import javax.jws.WebMethod;
import javax.jws.WebService;

@WebService
public interface PaymentService {
    @WebMethod
    public String foobar();
}
