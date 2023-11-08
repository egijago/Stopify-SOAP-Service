package services.payment;

import cores.Repository;
import services.logging.LoggingModel;
import services.logging.LoggingRepository;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class PaymentRepository extends Repository {
    static PaymentRepository instance;
    private PaymentRepository() {
        super("payment");
    }

    public static PaymentRepository getInstance() {
        if (instance == null) {
            instance = new PaymentRepository();
        }
        return instance;
    }

    public List<PaymentModel> fetchById(int id) throws SQLException {
        String sql = "SELECT * FROM " + tableName
                +" WHERE id_payment = ?;";
        List<PaymentModel> resultList = new ArrayList<PaymentModel>();
        ResultSet rs = executeQuery(sql, id);
        while (rs.next()) {
            PaymentModel model = new PaymentModel();
            model.initializeFromResultSet(rs);
            resultList.add(model);
        }
        rs.close();
        return resultList;
    }

    public List<PaymentModel> fetchAll() throws SQLException {
        String sql = "SELECT * FROM " + tableName +";";
        List<PaymentModel> resultList = new ArrayList<PaymentModel>();
        ResultSet rs = executeQuery(sql);
        while (rs.next()) {
            PaymentModel model = new PaymentModel();
            model.initializeFromResultSet(rs);
            resultList.add(model);
        }
        rs.close();
        return resultList;
    }

    public int insert(PaymentModel payment) throws SQLException {
        String sql = "INSERT INTO " + tableName + "(id_user, value, card_number, card_owner, card_exp_month, card_exp_year, card_cvc) "
                + "VALUES(?, ?, ?, ?, ?, ?, ?);";
        int affectedRow = executeUpdate(sql, payment.getIdUser(), payment.getValue(), payment.getCardNumber(), payment.getCardOwner(), payment.getCardExpMonth(), payment.getCardExpYear(), payment.getCardCvc());
        return affectedRow;
    }

    public int update(PaymentModel logging) throws SQLException {
        String sql = "UPDATE " + tableName + " SET value = ?, card_number = ?, card_owner = ?, card_exp_month = ?, card_exp_year = ?, card_cvc = ? WHERE id_payment = ?";
        int affectedRow = executeUpdate(sql, logging.getValue(), logging.getCardNumber(), logging.getCardOwner(), logging.getCardExpMonth(), logging.getCardExpYear(), logging.getCardCvc(), logging.getIdPayment());
        return affectedRow;
    }

    public int delete(int id) throws SQLException {
        String sql = "DELETE FROM " + tableName
                + " WHERE id_payment = ?;";
        int affectedRow = executeUpdate(sql, id);
        return affectedRow;
    }

}
