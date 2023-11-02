package authorizationwithapikey.apikeymanager;

public class CallbackService {
    private APIKeyManager apiKeyManager;

    public String handleCallback(String apiKey, String data) {
        if (!apiKeyManager.validateAPIKey(apiKey)) {
            return "Akses ditolak. API Key tidak valid.";
        }
        return "Hasil layanan callback";
    }
}
