public class ControladorPersona {
    private ModeloPersona modelo;
    private VistaPersona vista;

    public ControladorPersona(ModeloPersona modelo, VistaPersona vista){
        this.modelo = modelo;
        this.vista = vista;
    }
    public void actualizarModelo(){
        String nombre = vista.solicitaNombre();
        int edad = vista.solicitaEdad();

        modelo.setNombre(nombre);
        modelo.setEdad(edad);
    }
    public  void actualizarVista(){
        vista.verDatosPersonales(modelo.getNombre(),modelo.getEdad());
    }
}
