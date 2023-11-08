package cores;

import lombok.Getter;
import utils.Config;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Database {
    @Getter
    private static Database instance = null;
    private Connection connection;
    public Database() {
        try {
            Config config = Config.getInstance();
            String url = config.get("db.url");
            String user = config.get("db.user");
            String pass = config.get("db.pass");
            System.out.println("Trying to connect to database at " + url + " with user " + user + " and pass " + pass);

            DriverManager.registerDriver(new com.mysql.cj.jdbc.Driver());
            this.connection = DriverManager.getConnection(url, user, pass);
        } catch (SQLException ex) {
            System.out.println("SQLException: " + ex.getMessage());
            System.out.println("SQLState: " + ex.getSQLState());
            System.out.println("VendorError: " + ex.getErrorCode());
            ex.printStackTrace();
            System.exit(1);
        } catch (Exception e) {
            System.out.println(e.getMessage());
            e.printStackTrace();
            System.exit(1);
        }
    }
    public static Database getInstance() {
        if (instance == null) {
            instance = new Database();
        }
        return instance;
    }

    public Connection getConnection() {
        System.out.println("Connection: " + this.connection);
        return this.connection;
    }
}
