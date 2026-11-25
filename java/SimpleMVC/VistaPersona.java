import java.util.Scanner;

public class VistaPersona {
    private Scanner scanner = new Scanner(System.in);

    public void verDatosPersonales(String nombre, int edad){
        System.out.println("--- Datos de Persona ---");
        System.out.println("Nombre: " + nombre);
        System.out.println("Edad: " + edad);
    }
    public String solicitaNombre(){
        System.out.println("Ingresa el nombre: ");
        return scanner.nextLine();
    }
    public int solicitaEdad(){
        System.out.println("Ingresa la edad: ");
        int edad = scanner.nextInt();
        scanner.nextLine();     // Limpiamos el buffer de entrada
        return edad;
    }
}
