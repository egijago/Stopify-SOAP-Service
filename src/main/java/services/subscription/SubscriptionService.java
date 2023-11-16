package services.subscription;

import javax.jws.WebMethod;
import javax.jws.WebService;

public interface SubscriptionService {
    public boolean applySubscription(int idArtist, int idUser) throws Exception;
    public boolean confirmSubscription(int idArtist, int idUser) throws Exception;
    public boolean declineSubscription(int idArtist, int idUser) throws Exception;
    public String getSubscriptionStatus(int idArtist, int idUser) throws Exception;
    public int[] getAllPendingSubscriberByIdArtist(int idArtist) throws Exception;
    public int[] getAllConfirmedSubscribeeByIdUser(int idUser) throws Exception;

}
