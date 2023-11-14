package exceptions;

public class InvalidAPIKeyException extends Exception {
    public InvalidAPIKeyException() {
        super("Invalid API key provided");
    }
}
