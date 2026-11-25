package java.DataAccObjMVC;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class ProductoDAO {
    // Configuración de la conexión (Ajusta tu usuario y contraseña)
    private final String url = "jdbc:mysql://localhost:3000/sistema_productos";
    private final String usuario = "root";
    private final String password = "";

    private Connection conectar() throws SQLException {
        return DriverManager.getConnection(url, usuario, password);
    }

    // Obtener producto de la base de datos por su ID
    public Producto obtenerProducto(int id) {
        String sql = "SELECT nombre, precio FROM productos WHERE id = ?";
        try (Connection con = conectar(); 
             PreparedStatement ps = con.prepareStatement(sql)) {
            
            ps.setInt(1, id);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    return new Producto(rs.getString("nombre"), rs.getDouble("precio"));
                }
            }
        } catch (SQLException e) {
            System.out.println("Error al consultar: " + e.getMessage());
        }
        return null;
    }

    // Actualizar producto en la base de datos
    public void actualizarProducto(int id, String nuevoNombre, double nuevoPrecio) {
        String sql = "UPDATE productos SET nombre = ?, precio = ? WHERE id = ?";
        try (Connection con = conectar(); 
             PreparedStatement ps = con.prepareStatement(sql)) {
            
            ps.setString(1, nuevoNombre);
            ps.setDouble(2, nuevoPrecio);
            ps.setInt(3, id);
            ps.executeUpdate();
            System.out.println("-> Base de datos actualizada con éxito.");
            
        } catch (SQLException e) {
            System.out.println("Error al actualizar: " + e.getMessage());
        }
    }
}
