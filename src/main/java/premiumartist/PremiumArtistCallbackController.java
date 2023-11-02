package premiumartist;

import org.slf4j.LoggerFactory;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping("/callback")
public class PremiumArtistCallbackController {
    
    /**
     *
     */
    private static final org.slf4j.Logger logger = LoggerFactory.getLogger(PremiumArtistCallbackController.class);
    
    @PostMapping
    public String handlePaymentCallback() {
        logger.info("Panggilan kembali diterima.");
        return "Hasil layanan callback";
    }
}
