package exceptions;

public class UnspecifiedErrorException extends Exception {
    public UnspecifiedErrorException() {
        super("Unspecified error occured while proccessing your request.");
    }
}
