import DataBase.DB;

import java.util.List;

public class Main {
    public static void main(String[] args) {
        DB db=new DB("minecraft_dungeons", "localhost", "root", "");
        List<List<String>> list = db.getListOf("weapon");
        for (List<String> s:list) {
            System.out.printf("%s\n%s\n%s\n\n\n", s.get(0), s.get(1), s.get(2));
        }
    }
}