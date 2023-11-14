package services.payment;

import javax.jws.WebMethod;
import javax.jws.WebService;
import java.math.BigInteger;
import java.util.List;

public class PaymentServiceImpl implements  PaymentService{
    private static final PaymentRepository repo = PaymentRepository.getInstance();
    public boolean processPayment(int idUser, int idArtist, int amount, String cardNumber, String cardOwner, int cardExpMonth, int cardExpYear, int cardCvc) throws Exception {
        // simulate external payment call here
        PaymentRepository paymentRepository = PaymentRepository.getInstance();
        PaymentModel createPayment = new PaymentModel(-1, idUser, idArtist, amount, cardNumber, cardOwner, cardExpMonth, cardExpYear, cardCvc);
        int affectedRow = paymentRepository.insert(createPayment);
        return affectedRow == 1;
    }

    @WebMethod
    public BigInteger getTotalPaymentByIdArtist(int idArtist) throws Exception {
        PaymentModel payment = new PaymentModel();
        payment.setIdArtist(idArtist);
        List<PaymentModel> paymentList = repo.fetchAll(payment);
        BigInteger result = paymentList.stream().map(PaymentModel::getAmount).map(BigInteger::valueOf).reduce(new BigInteger("0"), (a, b) -> a.add(b));
        return result;
    }
}
