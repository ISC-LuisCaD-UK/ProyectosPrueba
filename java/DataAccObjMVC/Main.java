package java.DataAccObjMVC;

public class Main {
    public static void main(String[] args) {
        ProductoDAO dao = new ProductoDAO();
        ProductoVista vista = new ProductoVista();
        ProductoControlador controlador = new ProductoControlador(dao, vista);

        // 1. Consultar el producto ID: 1 creado inicialmente por SQL
        System.out.println("Consultando estado inicial...");
        controlador.mostrarProducto(1);

        // 2. Modificar el producto desde el sistema
        System.out.println("\nModificando datos...");
        controlador.modificarProducto(1, "Laptop Gamer Pro", 1350.50);
    }
}
