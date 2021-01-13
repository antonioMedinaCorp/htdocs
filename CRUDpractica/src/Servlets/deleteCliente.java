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
 * Servlet implementation class deleteCliente
 */
@WebServlet("/deleteCliente")
public class deleteCliente extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public deleteCliente() {
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
	    
		int id = Integer.parseInt(request.getParameter("idButton").trim());
		
		try (PrintWriter out = response.getWriter()) {

	           String sqlSentence = "DELETE FROM clientes where id = " + id;
	           Statement sql = Conexion.getConnection().createStatement();
	           
	           sql.execute(sqlSentence);
	           sql.close();

	           
	           response.sendRedirect("index.jsp");
	       } catch (SQLException ex) {
	         ex.printStackTrace();
	     }
	}

}
