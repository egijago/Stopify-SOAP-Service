package cores;

import java.sql.ResultSet;
import java.sql.SQLException;

public abstract class Model {
    public abstract void initializeFromResultSet(ResultSet rs) throws SQLException;
}
