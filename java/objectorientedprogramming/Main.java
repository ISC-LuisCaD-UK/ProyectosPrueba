package java.objectorientedprogramming;

public class Main {
    public static void main(String[] args) {
        alumno alumno1 = new alumno("Juan", "Pérez", 20);
        alumno1.mostrarDatos();

        alumno1.guardarDatos("María", "González", 22);
        alumno1.mostrarDatos();
    }
}
