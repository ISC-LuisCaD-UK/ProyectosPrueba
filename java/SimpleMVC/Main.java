public class Main {
    public static void main(String[] args) {
        ModeloPersona modelo = new ModeloPersona();
        VistaPersona vista = new VistaPersona();
        ControladorPersona controlador = new ControladorPersona(modelo, vista);

        controlador.actualizarModelo(); // El usuario escribe los datos
        controlador.actualizarVista();  // Se muestran los datos procesados
    }
}