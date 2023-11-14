package services.subscription;

import cores.Model;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import java.sql.ResultSet;
import java.sql.SQLException;
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class SubscriptionModel extends Model {
    private Integer idSubscription;
    private Integer idArtist;
    private Integer idUser;
    private String status;

    public static final String STAT_PENDING = "PENDING";
    public static final String STAT_CONFIRMED = "CONFIRMED";
    public static final String STAT_DECLINED = "DECLINED";
    @Override
    public void initializeFromResultSet(ResultSet rs) throws SQLException {
        this.idSubscription = rs.getInt("id_subscription");
        this.idArtist = rs.getInt("id_artist");
        this.idUser = rs.getInt("id_user");
        this.status = rs.getString("status");
    }
}
