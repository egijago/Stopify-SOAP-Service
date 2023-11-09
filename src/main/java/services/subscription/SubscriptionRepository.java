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
    public List<SubscriptionModel> fetchById(int id) throws SQLException {
        String sql = "SELECT * FROM " + tableName
                +" WHERE id_subscription = ?;";
        List<SubscriptionModel> resultList = new ArrayList<SubscriptionModel>();
        ResultSet rs = executeQuery(sql, id);
        while (rs.next()) {
            SubscriptionModel model = new SubscriptionModel();
            model.initializeFromResultSet(rs);
            resultList.add(model);
        }
        rs.close();
        return resultList;
    }

    public List<SubscriptionModel> fetchAll() throws SQLException {
        String sql = "SELECT * FROM " + tableName +";";
        List<SubscriptionModel> resultList = new ArrayList<SubscriptionModel>();
        ResultSet rs = executeQuery(sql);
        while (rs.next()) {
            SubscriptionModel model = new SubscriptionModel();
            model.initializeFromResultSet(rs);
            resultList.add(model);
        }
        rs.close();
        return resultList;
    }

    public int insert(SubscriptionModel subscription) throws SQLException {
        String sql = "INSERT INTO " + tableName + "(id_artist, id_user) "
                + "VALUES(?, ?);";
        int affectedRow = executeUpdate(sql, subscription.getIdArtist(), subscription.getIdUser());
        return affectedRow;
    }

    public int update(SubscriptionModel subscription) throws SQLException {
        String sql = "UPDATE " + tableName + " SET id_artist = ?, id_user = ? WHERE id_subscription = ?";
        int affectedRow = executeUpdate(sql, subscription.getIdArtist(), subscription.getIdUser(), subscription.getIdSubscription());
        return affectedRow;
    }

    public int delete(int id) throws SQLException {
        String sql = "DELETE FROM " + tableName
                + " WHERE id_subscription = ?;";
        int affectedRow = executeUpdate(sql, id);
        return affectedRow;
    }
}
