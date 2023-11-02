package subscriberuser;

import java.util.logging.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping("/callback")
public class SubscribeUserCallbackController {

    private static final Logger logger = (Logger) LoggerFactory.getLogger(SubscribeUserCallbackController.class);

    @PostMapping
    public String handlePaymentCallback() {
        logger.info("Panggilan kembali diterima.");
        return "Hasil layanan callback";
    }
}