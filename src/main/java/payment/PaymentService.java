package payment;

import jakarta.jws.WebMethod;
import jakarta.jws.WebService;

@WebService
public class PaymentService {

    @WebMethod
    public String processPayment(double amount, String paymentMethod, Object apiKey){
        if (!APIKeyManagervalidateAPIKey(apiKey)){
            return "Akees ditolak: API Key tidak valid.";
        }
        return "Pembayaran sebesar " + amount + " dengan metode " + paymentMethod + " berhasil diproses.";
    }

    private boolean APIKeyManagervalidateAPIKey(Object apiKey) {
        return false;
    }
    
}
