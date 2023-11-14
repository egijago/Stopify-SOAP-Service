package services.subscription;

import cores.Repository;
import services.payment.PaymentRepository;
import services.subscription.SubscriptionModel;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class SubscriptionRepository extends Repository {
    private static SubscriptionRepository instance ;
    private SubscriptionRepository() {
        super("subscription");
    }
    public static SubscriptionRepository getInstance() {
        if (instance == null) {
            instance = new SubscriptionRepository();
        }
        return instance;
    }
    public SubscriptionModel fetchOne(SubscriptionModel subscription) throws SQLException {
        String sql = "SELECT * FROM " + tableName
                + " WHERE"
                + (subscription.getIdSubscription() != null? " id_subscription = " + subscription.getIdSubscription(): " true") + " and"
                + (subscription.getIdArtist() != null? " id_artist = " + subscription.getIdArtist(): " true") + " and"
                + (subscription.getStatus() != null? " status = " + subscription.getStatus(): " true") + " and"
                + (subscription.getIdUser() != null? " id_user = " + subscription.getIdUser(): " true;")
                + " LIMIT 1;";
        ResultSet rs = executeQuery(sql);

        if (!rs.next()) {
            return null;
        }

        SubscriptionModel model = new SubscriptionModel();
        model.initializeFromResultSet(rs);
        rs.close();
        return model;
    }

    public List<SubscriptionModel> fetchAll(SubscriptionModel subscription) throws SQLException {
        String sql = "SELECT * FROM " + tableName
                + " WHERE"
                + (subscription.getIdSubscription() != null? " id_subscription = " + subscription.getIdSubscription(): " true") + " and"
                + (subscription.getIdArtist() != null? " id_artist = " + subscription.getIdArtist(): " true") + " and"
                + (subscription.getStatus() != null? " status = " + subscription.getStatus(): " true") + " and"
                + (subscription.getIdUser() != null? " id_user = " + subscription.getIdUser(): " true;");
        ResultSet rs = executeQuery(sql);
        List<SubscriptionModel> resultList = new ArrayList<SubscriptionModel>();
        while (rs.next()) {
            SubscriptionModel model = new SubscriptionModel();
            model.initializeFromResultSet(rs);
            resultList.add(model);
        }
        rs.close();
        return resultList;
    }

    public int insert(SubscriptionModel subscription) throws SQLException {
        String sql = "INSERT INTO " + tableName + "(id_artist, id_user, status) "
                + "VALUES(?, ?, ?);";
        int affectedRow = executeUpdate(sql, subscription.getIdArtist(), subscription.getIdUser(), SubscriptionModel.STAT_PENDING);
        return affectedRow;
    }

    public int update(SubscriptionModel subscription) throws SQLException {
        String sql = "UPDATE " + tableName + " SET id_artist = ?, id_user = ?, status = ? WHERE id_subscription = ?";
        int affectedRow = executeUpdate(sql, subscription.getIdArtist(), subscription.getIdUser(), subscription.getStatus(), subscription.getIdSubscription());
        return affectedRow;
    }

    public int delete(int id) throws SQLException {
        String sql = "DELETE FROM " + tableName
                + " WHERE id_subscription = ?;";
        int affectedRow = executeUpdate(sql, id);
        return affectedRow;
    }
}
