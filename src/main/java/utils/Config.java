package utils;

import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStream;
import java.util.Properties;

public class Config {
    private static Config instance;
    private Properties props;
    private static final String CONFIG_FILE = "config.properties";
    public static Config getInstance() {
        if (Config.instance == null) {
            try {
                Config.instance = new Config(CONFIG_FILE);
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        return Config.instance;
    }
    private Config(String pathToConfigFile) throws IOException {
        this.props = new Properties();
        InputStream input = getClass().getClassLoader().getResourceAsStream(pathToConfigFile);
        try {
            this.props.load(input);
        } catch (IOException ex) {
            // handle error
            ex.printStackTrace();
        } finally {
            input.close();
        }
    }
    public String get(String key) {
        return this.props.getProperty(key);
    }

    public static void main(String[] args) {

        Config instance = Config.getInstance();
        System.out.println(instance.get("db.user"));
    }
}