package authorizationwithapikey.apikeymanager;


import jakarta.jws.WebService;

@WebService
public class AuthorizationService {
    /**
     *
     */
    private String data;
    public String getData() {
        return data;
    }

    public void setData(String data) {
        this.data = data;
    }

    /**
     *
     */
    private String apiKey;
    public AuthorizationService(String apiKey) {
        this.apiKey = apiKey;
    }

    public AuthorizationService(String data, String apiKey, String object) {
        this.data = data;
        this.apiKey = apiKey;
        this.object = object;
    }

    public String getApiKey() {
        return apiKey;
    }

    public void setApiKey(String apiKey) {
        this.apiKey = apiKey;
    }

    /**
     *
     */
    private String object;

    public String getObject() {
        return object;
    }

    public void setObject(String object) {
        this.object = object;
    }


    public AuthorizationService() {
    }

    /**
     * @param apiKey
     * @param data
     * @param Object
     * @return
     */
public String processRequest(String apiKey, String data, String Object) {
        this.apiKey = apiKey;
        this.data = data;
        this.object = Object;
        if (!APIKeyManagervalidateAPIKey(apiKey)) {
            return "Akses ditolak. API Key tidak valid.";
        }
        return "Hasil Layanan SOAP";
    }

    private boolean APIKeyManagervalidateAPIKey(String apiKey) {
        // Implementasi validasi API Key di sini
        return false;
    }
}
