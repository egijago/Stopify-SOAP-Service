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
    private Integer idPayment;
    private Integer idUser;
    private Integer idArtist;
    private Integer amount;
    private String cardNumber;
    private String cardOwner;
    private Integer cardExpMonth;
    private Integer cardExpYear;
    private Integer cardCvc;

    @Override
    public void initializeFromResultSet(ResultSet rs) throws SQLException {
        this.idPayment = rs.getInt("id_payment");
        this.idUser = rs.getInt("id_user");
        this.idArtist = rs.getInt("id_artist");
        this.amount = rs.getInt("amount");
        this.cardNumber = rs.getString("card_number");
        this.cardOwner = rs.getString("card_owner");
        this.cardExpMonth = rs.getInt("card_exp_month");
        this.cardExpYear = rs.getInt("card_exp_year");
        this.cardCvc = rs.getInt("card_cvc");
    }
}
