package java.DataAccObjMVC;

// Archivo: ProductoVista.java
public class ProductoVista {
    public void imprimirDatosProducto(String nombreProducto, double precioProducto) {
        System.out.println("=== DETALLES DEL PRODUCTO ===");
        System.out.println("Nombre: " + nombreProducto);
        System.out.println("Precio: $" + precioProducto);
    }
}
