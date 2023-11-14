package exceptions;

public class NoApiKeyException extends  Exception {
    public NoApiKeyException() {
        super("No API key provided. Please specify on 'api-key' request header field.");
    }
}
