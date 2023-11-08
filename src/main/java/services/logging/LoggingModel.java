package services.logging;

import cores.Model;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Date;

@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
public class LoggingModel extends Model {
    private int idLogging;
    private String apiKey;
    private String ipAddress;
    private String endPoint;
    private String description;
    private Date requestedAt;

    @Override
    public void initializeFromResultSet(ResultSet rs) throws SQLException {
        this.idLogging = rs.getInt("id_logging");
        this.apiKey = rs.getString("api_key");
        this.ipAddress = rs.getString("ip_address");
        this.endPoint = rs.getString("end_point");
        this.description = rs.getString("description");
        this.requestedAt = rs.getTimestamp("requested_at");
    }
}
