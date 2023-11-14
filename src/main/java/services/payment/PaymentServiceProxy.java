package services.payment;

import cores.Proxy;
import exceptions.UnspecifiedErrorException;

import javax.jws.WebMethod;
import javax.jws.WebService;
import java.math.BigInteger;

@WebService
public class PaymentServiceProxy extends Proxy implements PaymentService {
    private final static PaymentService service = new PaymentServiceImpl();
    @WebMethod
    public boolean processPayment(int idUser, int idArtist, int amount, String cardNumber, String cardOwner, int cardExpMonth, int cardExpYear, int cardCvc) throws Exception {
        validate();
        log(idUser, idArtist, amount, cardNumber, cardOwner, cardExpMonth, cardExpYear, cardCvc);
        try {
            return service.processPayment(idUser, idArtist, amount, cardNumber, cardOwner, cardExpMonth, cardExpYear, cardCvc);
        } catch (Exception e) {
            e.printStackTrace();
            throw new UnspecifiedErrorException();
        }
    }

    @WebMethod
    public BigInteger getTotalPaymentByIdArtist(int idArtist) throws Exception {
        validate();
        log(idArtist);
        try {
            return service.getTotalPaymentByIdArtist(idArtist);
        } catch (Exception e) {
            e.printStackTrace();
            throw new UnspecifiedErrorException();
        }
    }
}
