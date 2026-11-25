package java.DataAccObjMVC;

public class ProductoControlador {
    private ProductoDAO dao;
    private ProductoVista vista;

    public ProductoControlador(ProductoDAO dao, ProductoVista vista) {
        this.dao = dao;
        this.vista = vista;
    }

    // Muestra en la vista el producto guardado en la BD
    public void mostrarProducto(int id) {
        Producto modelo = dao.obtenerProducto(id);
        if (modelo != null) {
            vista.imprimirDatosProducto(modelo.getNombre(), modelo.getPrecio());
        } else {
            System.out.println("El producto con ID " + id + " no existe.");
        }
    }

    // Modifica los datos en la BD y refresca la vista
    public void modificarProducto(int id, String nuevoNombre, double nuevoPrecio) {
        dao.actualizarProducto(id, nuevoNombre, nuevoPrecio);
        // Volvemos a consultar para verificar que la vista pinte el dato real de la BD
        mostrarProducto(id);
    }
}
