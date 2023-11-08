package services.logging;

import cores.Repository;

import javax.xml.transform.Result;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class LoggingRepository extends Repository {
    static LoggingRepository instance;
    public LoggingRepository() {
        super("logging");
    }

    public static LoggingRepository getInstance() {
        if (instance == null) {
            instance = new LoggingRepository();
        }
        return instance;
    }

    public List<LoggingModel> fetchAll() throws SQLException {
        String sql = "SELECT * FROM " + tableName +";";
        List<LoggingModel> resultList = new ArrayList<LoggingModel>();
        ResultSet rs = executeQuery(sql);
        while (rs.next()) {
                LoggingModel model = new LoggingModel();
                model.initializeFromResultSet(rs);
                resultList.add(model);
        }
        return resultList;
    }

    public int insert(LoggingModel logging) throws SQLException {
        String sql = "INSERT INTO " + tableName + "(api_key, ip_address, end_point, description, requested_at)"
                + "VALUES(?, ?, ?, ?, ?);";
        executeUpdate(sql, logging.getApiKey(), logging.getIpAddress(), logging.getEndPoint(), logging.getDescription(), logging.getRequestedAt());
        return 0;
    }
    public int delete(int id) throws SQLException {
        String sql = "DELETE FROM " + tableName
                + " WHERE id_logging = ?;";
        return executeUpdate(sql, 1);
    }


    public static void main(String[] args) {
        try {
            LoggingModel logging = new LoggingModel(1, "1", "1", "1", "1", new Date());
            System.out.println(LoggingRepository.getInstance().insert(logging));
            System.out.println(LoggingRepository.getInstance().delete(1));
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
