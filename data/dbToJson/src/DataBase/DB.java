package DataBase;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class DB {
    private String dbname;
    private String host;
    private String user;
    private String pw;

    public DB(String databaseName, String hostName, String username, String password) {
        dbname = databaseName;
        host = hostName;
        user = username;
        pw = password;
    }

    public List<List<String>> getListOf(String table) {
        try (Connection conn = DriverManager.getConnection(
                "jdbc:mysql://" + host + ":3306/" + dbname + "?useSSL=false&serverTimezone=UTC", user, pw);) {
            PreparedStatement query = switch (table.toLowerCase()) {
                case "weapon" -> conn.prepareStatement("SELECT * FROM weapon;");
                case "armor" -> conn.prepareStatement("SELECT * FROM armor;");
                case "artifact" -> conn.prepareStatement("SELECT * FROM artifact;");
                default -> conn.prepareStatement("");
            };

            ResultSet infos = query.executeQuery();
            List<List<String>> items = new ArrayList<>();
            List<String> line = new ArrayList<>();
            while (infos.next()){
                line.add(infos.getString(0));
                line.add(infos.getString(1));
                line.add(infos.getString(2));
                items.add(line);
            }

            return items;
        } catch (SQLException e) {
            System.err.format("SQL State: %s\n%s", e.getSQLState(), e.getMessage());
        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }

    public List<String> getSpecsOf(String table, String item_id) {
        try (Connection conn = DriverManager.getConnection(
                "jdbc:mysql://" + host + ":3306/" + dbname + "?useSSL=false&serverTimezone=UTC", user, pw);) {
            PreparedStatement query;

            switch (table.toLowerCase()){
                case "weapon":
                    query = conn.prepareStatement( "SELECT * FROM weaponspecs WHERE WeaponId LIKE ?;");
                    query.setString(1, item_id);
                    break;
                case "armor":
                    query = conn.prepareStatement( "SELECT * FROM armorspecs WHERE ArmorId LIKE ?;");
                    query.setString(1, item_id);
                    break;
                case "artifact":
                    query = conn.prepareStatement( "SELECT * FROM artifactspecs WHERE ArtifactId LIKE ?;");
                    query.setString(1, item_id);
                    break;
                default:
                    query = conn.prepareStatement( "");
                    break;
            }

            ResultSet infos = query.executeQuery();
            List<String> specs = new ArrayList<>();
            boolean is_empty = false;

            switch (table.toLowerCase()){
                case "weapon":
                    while (infos.next()) {
                        specs.add(infos.getString(table + "Id").replace("%27", "'").replace('_', ' '));
                        specs.add(infos.getString("Rarity"));
                        specs.add(infos.getString("Power"));
                        specs.add(infos.getString("Speed"));
                        specs.add(infos.getString("Area_Ammo"));
                        specs.add(infos.getString("Properties"));
                        specs.add(infos.getString("Enchantment"));
                    }
                    break;
                case "armor":
                    while (infos.next()) {
                        specs.add(infos.getString(table + "Id").replace("%27", "'").replace('_', ' '));
                        specs.add(infos.getString("Rarity"));
                        specs.add(infos.getString("Properties"));
                        specs.add(infos.getString("Enchantment"));
                    }
                    break;
                case "artifact":
                    while (infos.next()) {
                        specs.add(infos.getString(table + "Id").replace("%27", "'").replace('_', ' '));
                        specs.add(infos.getString("Rarity"));
                        specs.add(infos.getString("Properties"));
                    }
                    break;
                default:
                    is_empty = true;
                    break;
            }

            if (is_empty){
                return new ArrayList<>();
            }

            return specs;
        } catch (SQLException e) {
            System.err.format("SQL State: %s\n%s", e.getSQLState(), e.getMessage());
        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
}