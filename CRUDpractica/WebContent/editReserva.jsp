<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="UTF-8"%>
<link
	href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
	rel="stylesheet" id="bootstrap-css">
<script
	src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script
	src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link
	href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
	rel="stylesheet">
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6 mx-auto text-center">
				<div class="header-title">
					<h1 class="wv-heading--title">Editar datos de Reserva</h1>

				</div>
			</div>

		</div>
		<div class="row mt-5">
			<div class="col-md-4 mx-auto">
				<div class="myform form ">
					<form action="/CRUDpractica/editReserva" method="post" name="login">
						<div class="form-group">
							<input type="text" name="id" class="form-control my-input"
								 placeholder="id" value="<%= request.getParameter("idBotonEditar") %>" readonly>
						</div>

						<div class="form-group">
							<input type="text" name="nHabitacion" class="form-control my-input"
								 placeholder="Número de habitación">
						</div>
						
						<div class="form-group">
							<input type="text" name="fechaEntrada" class="form-control my-input"
								placeholder="Fecha de entrada">
						</div>
						
						<div class="form-group">
							<input type="text" name="fechaSalida" class="form-control my-input"
								 placeholder="Fecha de Salida">
						</div>
						

						<div class="text-center ">
							<button type="submit" class=" btn btn-primary btn-block send-button tx-tfm ">
								Modificar datos</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</body>