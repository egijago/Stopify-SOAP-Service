package services.subscription;
import java.util.List;

public class SubscriptionServiceImpl implements SubscriptionService {
    private SubscriptionRepository repo = SubscriptionRepository.getInstance();

    @Override
    public boolean applySubscription(int idArtist, int idUser) throws Exception {
        SubscriptionModel subscription = new SubscriptionModel();
        subscription.setIdArtist(idArtist);
        subscription.setIdUser(idUser);
        SubscriptionModel rs = repo.fetchOne(subscription);
        if (rs != null) {
            return false;
        }
        subscription.setStatus(SubscriptionModel.STAT_PENDING);
        int rowAffected = repo.insert(subscription);
        return rowAffected == 1;
    }

    @Override
    public boolean confirmSubscription(int idArtist, int idUser) throws Exception {
        SubscriptionModel subscription = new SubscriptionModel();
        subscription.setIdArtist(idArtist);
        subscription.setIdUser(idUser);
        subscription = repo.fetchOne(subscription);
        if (subscription == null) {
            return false;
        }
        subscription.setStatus(SubscriptionModel.STAT_CONFIRMED);
        int rowAffected = repo.update(subscription);
        return rowAffected == 1;
    }

    @Override
    public boolean declineSubscription(int idArtist, int idUser) throws Exception {
        SubscriptionModel subscription = new SubscriptionModel();
        subscription.setIdArtist(idArtist);
        subscription.setIdUser(idUser);
        subscription = repo.fetchOne(subscription);
        if (subscription == null) {
            return false;
        }
        subscription.setStatus(SubscriptionModel.STAT_DECLINED);
        int rowAffected = repo.update(subscription);
        return rowAffected == 1;
    }

    @Override
    public String getSubscriptionStatus(int idArtist, int idUser) throws Exception {
        SubscriptionModel subscription = new SubscriptionModel();
        subscription.setIdArtist(idArtist);
        subscription.setIdUser(idUser);
        subscription = repo.fetchOne(subscription);
        if (subscription == null) {
            return null;
        }
        return subscription.getStatus();
    }

    @Override
    public int[] getAllPendingSubscriberByIdArtist(int idArtist) throws Exception {
        SubscriptionModel subscription = new SubscriptionModel();
        subscription.setIdArtist(idArtist);
        subscription.setStatus(SubscriptionModel.STAT_PENDING);
        List<SubscriptionModel> subscriptions = repo.fetchAll(subscription);
        return subscriptions.stream().map(SubscriptionModel::getIdUser).mapToInt(i -> i).toArray();
    }

    @Override
    public int[] getAllConfirmedSubscribeeByIdUser(int idUser) {
        try {
            SubscriptionModel subscription = new SubscriptionModel();
            subscription.setIdArtist(idUser);
            subscription.setStatus(SubscriptionModel.STAT_CONFIRMED);
            List<SubscriptionModel> subscriptions = repo.fetchAll(subscription);
            return subscriptions.stream().map(SubscriptionModel::getIdUser).mapToInt(i -> i).toArray();
        } catch (Exception e){
            e.printStackTrace();
            return null;
        }
    }
}
