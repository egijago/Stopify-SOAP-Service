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

    public PaymentModel fetchOne(PaymentModel payment) throws SQLException {
        String sql = "SELECT * FROM " + tableName + " WHERE"
                + (payment.getIdPayment() != null? " id_payment = " + payment.getIdPayment(): " true") + " and"
                + (payment.getCardNumber() != null? " card_number = " + payment.getCardNumber(): " true") + " and"
                + (payment.getCardOwner() != null? " card_owner = " + payment.getCardOwner(): " true") + " and"
                + (payment.getAmount() != null? " amount = " + payment.getAmount(): " true") + " and"
                + (payment.getCardCvc() != null? " card_cvc = " + payment.getCardCvc(): " true") + " and"
                + (payment.getCardExpMonth() != null? " card_exp_month = " + payment.getCardExpMonth(): " true") + " and"
                + (payment.getCardExpYear() != null? " card_exp_year = " + payment.getCardExpYear(): " true") + " and"
                + (payment.getIdArtist() != null? " id_artist = " + payment.getIdArtist(): " true") + " and"
                + (payment.getIdUser() != null? " id_user = " + payment.getIdUser(): " true " +
                "LIMIT 1;");
        ResultSet rs = executeQuery(sql);
        if (!rs.next()) {
            return null;
        }
        PaymentModel model = new PaymentModel();
        model.initializeFromResultSet(rs);
        rs.close();
        return model;
    }

    public List<PaymentModel> fetchAll(PaymentModel payment) throws SQLException {
        String sql = "SELECT * FROM " + tableName + " WHERE"
                + (payment.getIdPayment() != null? " id_payment = " + payment.getIdPayment(): " true") + " and"
                + (payment.getCardNumber() != null? " card_number = " + payment.getCardNumber(): " true") + " and"
                + (payment.getCardOwner() != null? " card_owner = " + payment.getCardOwner(): " true") + " and"
                + (payment.getAmount() != null? " amount = " + payment.getAmount(): " true") + " and"
                + (payment.getCardCvc() != null? " card_cvc = " + payment.getCardCvc(): " true") + " and"
                + (payment.getCardExpMonth() != null? " card_exp_month = " + payment.getCardExpMonth(): " true") + " and"
                + (payment.getCardExpYear() != null? " card_exp_year = " + payment.getCardExpYear(): " true") + " and"
                + (payment.getIdArtist() != null? " id_artist = " + payment.getIdArtist(): " true") + " and"
                + (payment.getIdUser() != null? " id_user = " + payment.getIdUser(): " true;");
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
        String sql = "INSERT INTO " + tableName + "(id_user, id_artist, amount, card_number, card_owner, card_exp_month, card_exp_year, card_cvc) "
                + "VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
        int affectedRow = executeUpdate(sql, payment.getIdUser(), payment.getIdArtist(), payment.getAmount(), payment.getCardNumber(), payment.getCardOwner(), payment.getCardExpMonth(), payment.getCardExpYear(), payment.getCardCvc());
        return affectedRow;
    }

//    public int update(PaymentModel payment) throws SQLException {
//        String sql = "UPDATE " + tableName + " SET amount = ?, card_number = ?, card_owner = ?, card_exp_month = ?, card_exp_year = ?, card_cvc = ? WHERE id_payment = ?";
//        int affectedRow = executeUpdate(sql, payment.getAmount(), payment.getCardNumber(), payment.getCardOwner(), payment.getCardExpMonth(), payment.getCardExpYear(), payment.getCardCvc(), payment.getIdPayment());
//        return affectedRow;
//    }
//
//    public int delete(int id) throws SQLException {
//        String sql = "DELETE FROM " + tableName
//                + " WHERE id_payment = ?;";
//        int affectedRow = executeUpdate(sql, id);
//        return affectedRow;
//    }

}
