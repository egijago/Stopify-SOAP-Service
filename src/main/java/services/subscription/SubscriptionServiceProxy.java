package services.subscription;

import cores.Proxy;
import exceptions.UnspecifiedErrorException;

import javax.jws.WebMethod;
import javax.jws.WebService;

@WebService
public class SubscriptionServiceProxy extends Proxy implements SubscriptionService {
    private static final SubscriptionService service = new SubscriptionServiceImpl();
    @WebMethod
    public boolean applySubscription(int idArtist, int idUser) throws Exception {
        validate();
        log(idArtist, idUser);
        try {
            return service.applySubscription(idArtist, idUser);
        } catch (Exception e) {
            e.printStackTrace();
            throw new UnspecifiedErrorException();
        }
    }

    @WebMethod
    public boolean confirmSubscription(int idArtist, int idUser) throws Exception {
        validate();
        log(idArtist, idUser);
        try {
            return service.confirmSubscription(idArtist, idUser);
        } catch (Exception e) {
            e.printStackTrace();
            throw new UnspecifiedErrorException();
        }
    }

    @WebMethod
    public boolean declineSubscription(int idArtist, int idUser) throws Exception {
        validate();
        log(idArtist, idUser);
        try {
            return service.declineSubscription(idArtist, idUser);
        } catch (Exception e) {
            e.printStackTrace();
            throw new UnspecifiedErrorException();
        }
    }

    @Override
    public int[] getAllPendingSubscriberByIdArtist(int idArtist) throws Exception {
        validate();
        log(idArtist);
        try {
            return service.getAllPendingSubscriberByIdArtist(idArtist);
        } catch (Exception e) {
            e.printStackTrace();
            throw new UnspecifiedErrorException();
        }
    }

    @Override
    public int[] getAllConfirmedSubscribeeByIdUser(int idUser) throws Exception {
        validate();
        log(idUser);
        try {
            return service.getAllConfirmedSubscribeeByIdUser(idUser);
        } catch (Exception e) {
            e.printStackTrace();
            throw new UnspecifiedErrorException();
        }
    }

    @Override
    public String getSubscriptionStatus(int idArtist, int idUser) throws Exception {
        validate();
        log(idArtist, idUser);
        try {
            return service.getSubscriptionStatus(idArtist, idUser);
        } catch (Exception e) {
            e.printStackTrace();
            throw new UnspecifiedErrorException();
        }
    }

    
    // @WebMethod
    // public String getAllSUbcs(int idArtist, int idUser) throws Exception {
    //     validate();
    //     log(idArtist, idUser);
    //     try {
    //         return service.getSubscriptionStatus(idArtist, idUser);
    //     } catch (Exception e) {
    //         throw new UnspecifiedErrorException();
    //     }
    // }
}
