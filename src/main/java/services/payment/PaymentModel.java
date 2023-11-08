package services.payment;

import cores.Model;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import java.sql.ResultSet;
import java.sql.SQLException;

@Setter
@Getter
@AllArgsConstructor
@NoArgsConstructor
public class PaymentModel extends Model {
    private int idPayment;
    private int idUser;
    private int value;
    private String cardNumber;
    private String cardOwner;
    private int cardExpMonth;
    private int cardExpYear;
    private int cardCvc;

    @Override
    public void initializeFromResultSet(ResultSet rs) throws SQLException {
        this.idPayment = rs.getInt("id_payment");
        this.idUser = rs.getInt("id_user");
        this.value = rs.getInt("value");
        this.cardNumber = rs.getString("card_number");
        this.cardOwner = rs.getString("card_owner");
        this.cardExpMonth = rs.getInt("card_exp_month");
        this.cardExpYear = rs.getInt("card_exp_year");
        this.cardCvc = rs.getInt("card_cvc");
    }
}
