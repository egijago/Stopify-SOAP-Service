package authorizationwithapikey;

import jakarta.jws.WebMethod;
import jakarta.jws.WebService;

@WebService
public interface APIKeyManager {
    void generateAPIKey(String apiKey);
    @WebMethod
    boolean validateAPIKey(String apiKey);

    }
