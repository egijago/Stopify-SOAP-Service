package cores;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public abstract class Repository<Model> {
    protected Database db;
    protected String tableName;

    protected Repository(String tableName) {
        this.db = new Database();
        this.tableName = tableName;
    }

    protected ResultSet executeQuery(String sql, Object... parameters) throws SQLException {
        Connection connection = db.getConnection();
        PreparedStatement preparedStatement = connection.prepareStatement(sql);
        for (int i = 0; i < parameters.length; i++) {
            preparedStatement.setObject(i + 1, parameters[i]);
        }
        return preparedStatement.executeQuery();
    }
    protected int executeUpdate(String sql, Object... parameters) throws SQLException {
        Connection connection = db.getConnection();
        PreparedStatement preparedStatement = connection.prepareStatement(sql);
        for (int i = 0; i < parameters.length; i++) {
            preparedStatement.setObject(i + 1, parameters[i]);
        }
        return preparedStatement.executeUpdate();
    }

}
