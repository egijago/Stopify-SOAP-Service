package services.subscription;

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
public class SubscriptionModel extends Model {
    private int idSubscription;
    private int idArtist;
    private int idUser;
    @Override
    public void initializeFromResultSet(ResultSet rs) throws SQLException {
        this.idSubscription = rs.getInt("id_subscription");
        this.idArtist = rs.getInt("id_artist");
        this.idUser = rs.getInt("id_user");
    }
}
