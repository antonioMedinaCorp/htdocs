package modelo;

public class Cliente {

	private int id;
	private String nombre;
	private String apellidos;
	private String usuario;
	private String password;
	
	

	/**
	 * @param nombre
	 * @param apellidos
	 * @param usuario
	 * @param password
	 */
	public Cliente(int id, String nombre, String apellidos, String usuario, String password) {
		super();
		this.id = id;
		this.nombre = nombre;
		this.apellidos = apellidos;
		this.usuario = usuario;
		this.password = password;
	}
	
	









	/**
	 * @return the nombre
	 */
	public String getNombre() {
		return nombre;
	}





	/**
	 * @param nombre the nombre to set
	 */
	public void setNombre(String nombre) {
		this.nombre = nombre;
	}





	/**
	 * @return the apellidos
	 */
	public String getApellidos() {
		return apellidos;
	}





	/**
	 * @param apellidos the apellidos to set
	 */
	public void setApellidos(String apellidos) {
		this.apellidos = apellidos;
	}





	/**
	 * @return the usuario
	 */
	public String getUsuario() {
		return usuario;
	}





	/**
	 * @param usuario the usuario to set
	 */
	public void setUsuario(String usuario) {
		this.usuario = usuario;
	}





	/**
	 * @return the password
	 */
	public String getPassword() {
		return password;
	}





	/**
	 * @param password the password to set
	 */
	public void setPassword(String password) {
		this.password = password;
	}











	/**
	 * @return the id
	 */
	public int getId() {
		return id;
	}











	/**
	 * @param id the id to set
	 */
	public void setId(int id) {
		this.id = id;
	}

}
