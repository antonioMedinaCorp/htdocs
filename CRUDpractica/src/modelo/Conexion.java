package modelo;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

public class Conexion {

	public static Connection conn = null;


	public static Connection getConnection(){

		try {
			Class.forName("com.mysql.cj.jdbc.Driver");

			if (conn == null) {

				conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/hotel?serverTimezone=UTC", "java",
						"1234");

			}
			System.out.println("Connected to database");
		} catch (ClassNotFoundException | SQLException e) {
			e.printStackTrace();
		}


		return conn;
	}
	

}


