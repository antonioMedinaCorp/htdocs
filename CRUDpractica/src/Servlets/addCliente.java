package Servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.sql.Statement;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import modelo.Conexion;

/**
 * Servlet implementation class addCliente
 */
@WebServlet("/addCliente")
public class addCliente extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public addCliente() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");


       int id = Integer.parseInt(request.getParameter("id"));
       String nombre = request.getParameter("nombre");
       String apellido = request.getParameter("apellidos");
       String usuario = request.getParameter("usuario");
       String password = request.getParameter("password");

         

       try (PrintWriter out = response.getWriter()) {
    	   System.out.println(nombre);
           String sqlSentence = "INSERT INTO clientes VALUES ("+ id +",'"+ nombre +"','"+apellido+"','"+usuario+"','"+password+"')";
           System.out.println(sqlSentence);
           Statement stm = Conexion.getConnection().createStatement();

           stm.execute(sqlSentence);
           stm.close();
           
           response.sendRedirect("index.jsp");
       } catch (SQLException ex) {
         ex.printStackTrace();
     }
	}

}
