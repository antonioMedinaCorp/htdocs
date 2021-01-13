package modelo;

public class Reserva {
	private Cliente cliente;
	private Habitacion habitacion;
	private String fechaEntrada;
	private String fechaSalida;
	
	
	
	/**
	 * @param cliente
	 * @param habitacion
	 * @param fechaEntrada
	 * @param fechaSalida
	 */
	public Reserva(Cliente cliente, Habitacion habitacion, String fechaEntrada, String fechaSalida) {
		super();
		this.cliente = cliente;
		this.habitacion = habitacion;
		this.fechaEntrada = fechaEntrada;
		this.fechaSalida = fechaSalida;
	}

	


	public Reserva() {
		// TODO Auto-generated constructor stub
	}




	/**
	 * @return the cliente
	 */
	public Cliente getCliente() {
		return cliente;
	}




	/**
	 * @param cliente the cliente to set
	 */
	public void setCliente(Cliente cliente) {
		this.cliente = cliente;
	}




	/**
	 * @return the habitacion
	 */
	public Habitacion getHabitacion() {
		return habitacion;
	}




	/**
	 * @param habitacion the habitacion to set
	 */
	public void setHabitacion(Habitacion habitacion) {
		this.habitacion = habitacion;
	}




	/**
	 * @return the fechaEntrada
	 */
	public String getFechaEntrada() {
		return fechaEntrada;
	}




	/**
	 * @param fechaEntrada the fechaEntrada to set
	 */
	public void setFechaEntrada(String fechaEntrada) {
		this.fechaEntrada = fechaEntrada;
	}




	/**
	 * @return the fechaSalida
	 */
	public String getFechaSalida() {
		return fechaSalida;
	}




	/**
	 * @param fechaSalida the fechaSalida to set
	 */
	public void setFechaSalida(String fechaSalida) {
		this.fechaSalida = fechaSalida;
	}
	
	

}
