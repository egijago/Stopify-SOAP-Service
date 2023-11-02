package authorizationwithapikey;



@WebService
public class DefaultAPIKeyManager implements APIKeyManager {

    @Override
    public boolean validateAPIKey(String apiKey) {
        if ("your_api_key_here".equals(apiKey)) {
            return true;
        } else {
            return false;
        }
    }

    @Override
    public void generateAPIKey(String apiKey) {
        throw new UnsupportedOperationException("Unimplemented method 'generateAPIKey'");
    }
}
