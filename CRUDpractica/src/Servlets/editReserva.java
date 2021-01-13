package Servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import java.sql.Statement;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import modelo.Conexion;

/**
 * Servlet implementation class editReserva
 */
@WebServlet("/editReserva")
public class editReserva extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public editReserva() {
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

		int idCliente = Integer.parseInt(request.getParameter("id").trim());
		int nHabitacion = Integer.parseInt(request.getParameter("nHabitacion").trim());
		String fechaEntrada = request.getParameter("fechaEntrada");
		String fechaSalida = request.getParameter("fechaSalida");
	
		
		try (PrintWriter out = response.getWriter()) {

			String sqlSentence = "update reservas set nHabitacion = '"+ nHabitacion +"', fechaEntrada='"+fechaEntrada+"', fechaSalida='"+fechaSalida+"' where idCliente ='" + idCliente +"'";
			Statement sql = Conexion.getConnection().createStatement();

			sql.execute(sqlSentence);
			sql.close();

			response.sendRedirect("reservas.jsp");
		} catch (SQLException ex) {
			ex.printStackTrace();
		}
	}

}
