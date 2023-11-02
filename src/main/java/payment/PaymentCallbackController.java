package payment;

import java.util.logging.Logger;

import org.slf4j.LoggerFactory;

@RestController
@RequestMapping("/callback")
public class PaymentCallbackController {

    private static final Logger logger = (Logger) LoggerFactory.getLogger(PaymentCallbackController.class);
    
    /**
     * @return
     */
    @postMapping
    public String handlePaymentCallback(){

        logger.info("Panggilan kembali diterima.");
        return "Hasil layanan callback";
    }
    
}
