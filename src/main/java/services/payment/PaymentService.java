package services.payment;


import java.math.BigInteger;

public interface PaymentService {
    public boolean processPayment(int idUser,int idArtist, int amount, String cardNumber, String cardOwner, int cardExpMonth, int cardExpYear, int cardCvc) throws Exception;

    public BigInteger getTotalPaymentByIdArtist(int idArtist) throws Exception;
}
