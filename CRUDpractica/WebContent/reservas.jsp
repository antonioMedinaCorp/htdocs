<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="modelo.Conexion"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="ISO-8859-1"%>
<%-- 
    Document   : index
    Created on : 02-dic-2020, 19:44:52
    Author     : anton
--%>

<%
	Statement stm = Conexion.getConnection().createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
	ResultSet rs = stm.executeQuery("SELECT * FROM clientes ");
	
	Statement stm2 = Conexion.getConnection().createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
	ResultSet rsHabitacion = stm2.executeQuery("SELECT * FROM habitaciones ");

	Statement stm3 = Conexion.getConnection().createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
	ResultSet rsRes = stm3.executeQuery("SELECT * FROM reservas join clientes where reservas.idCliente = clientes.id ");
%>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Gestión de huéspedes</title>
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script
	src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
	
</script>
</head>


<body>
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>
								Gestión de <b>Reservas</b>
							</h2>
						</div>
						<div class="col-sm-6">
							<a href="#addReservaModal" class="btn btn-success"
								data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>
									Nueva Reserva</span></a>
							<a href="/CRUDpractica/index.jsp" class="btn btn-primary"> <span>
									Clientes</span></a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>CLIENTE</th>
							<th>N DE HABITACIÓN</th>
							<th>FECHA ENTRADA</th>
							<th>FECHA SALIDA</th>
							<th>ACCIÓN</th>
							

						</tr>
					</thead>
					<tbody>


						<%
							while (rsRes.next()) {
							out.println("<tr>");
							out.println("<td>" + rsRes.getString("nombre") + "</td>");
							out.println("<td>" + rsRes.getInt("nHabitacion") + "</td>");
							out.println("<td>" + rsRes.getString("fechaEntrada") + "</td>");
							out.println("<td>" + rsRes.getString("fechaSalida") + "</td>");
						%>
						<td>
						<div class="d-flex flex-row">
							<form action="/CRUDpractica/editReserva.jsp" method="post">
							<button type="submit" class="btn btn-warning" value="<%= rsRes.getInt("idCliente") %>" name="idBotonEditar"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
							</form>
							
							<form action="/CRUDpractica/deleteReserva" method="post">
							<button type="submit" class="btn btn-danger" value="<%= rsRes.getInt("idCliente") %>" name="idButton"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
							 
							</form>
						</div>
						</td>
						<%
							out.println("</tr>");
						} rsRes.beforeFirst();
						%>

					</tbody>
				</table>

			</div>
		</div>
	</div>

	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="/CRUDpractica/addCliente" method="post">
					<div class="modal-header">
						<h4 class="modal-title">Añadir Cliente</h4>
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>ID</label> <input type="text" class="form-control"
								name="id" required>
						</div>
						<div class="form-group">
							<label>Nombre</label> <input type="text" class="form-control"
								name="nombre" required>
						</div>
						<div class="form-group">
							<label>Apellidos</label> <input type="text" class="form-control"
								name="apellidos" required>
							</textarea>
						</div>
						<div class="form-group">
							<label>Usuario</label> <input type="text" class="form-control"
								name="usuario" required>
						</div>
						<div class="form-group">
							<label>Contraseña</label> <input type="password" class="form-control"
								name="password" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"> 
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Edit Modal HTML -->
	<div id="editarClienteModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>ID</label> <input type="text" class="form-control"
								value="<% if(request.getParameter("idBotonEditar")!= null){
										out.print(request.getParameter("idBotonEditar"));
								}
									%>" name="id" readonly>
						</div>
					
						<div class="form-group">
							<label>Name</label> <input type="text" class="form-control"
								required>
						</div>
						<div class="form-group">
							<label>Email</label> <input type="email" class="form-control"
								required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label> <input type="text" class="form-control"
								required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal"
							value="Cancel"> <input type="submit" class="btn btn-info"
							value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Añadir Reserva Modal HTML -->
	<div id="addReservaModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="/CRUDpractica/addReserva" method="post">
					<div class="modal-header">
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Cliente</label> 
						<select name="cliente">
							<%
							while (rs.next()) {
							%>
							
							<option value="<%= rs.getInt("id") %>"><%= rs.getString("nombre") %></option>
						
							<%	
							}
							%>
						</select>
						</div>
					
						<div class="form-group">
							<label>Habitación</label>
							<select name="nHabitacion">
							<%
							while (rsHabitacion.next()) {
							%>
							
							<option value="<%= rsHabitacion.getInt("nHabitacion") %>"><%= rsHabitacion.getInt("nHabitacion") %></option>
						
							<%	
							}
							%>
						</select>
						</div>
						
						<div class="form-group">
							<label>Fecha de entrada</label>
							 <input type="text" class="form-control" name="fechaEntrada" required>
						</div>
						<div class="form-group">
							<label>Fecha de salida</label>
							<input type="text" class="form-control" name="fechaSalida" required></textarea>
						</div>
	
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal"
							value="Cancel"> 
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>


	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Borrar Cliente</h4>
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning">
							<small>This action cannot be undone.</small>
						</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal"
							value="Cancel"> <input type="submit"
							class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>