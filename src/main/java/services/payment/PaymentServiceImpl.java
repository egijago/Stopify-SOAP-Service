package services.payment;

import javax.jws.WebService;

@WebService(endpointInterface = "services.payment.PaymentService")
public class PaymentServiceImpl implements  PaymentService{
    public String foobar() {
        return "Foobar from payment service";
    }
}
