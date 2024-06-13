<?php
class CarritoDAO {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarAlCarrito($producto) {
        $producto_escapado = mysqli_real_escape_string($this->conexion, $producto);
        $query = "INSERT INTO carrito (producto) VALUES ('$producto_escapado')";
        
        // Ejecutar la consulta
        $resultado = mysqli_query($this->conexion, $query);
        
        if (!$resultado) {
            die("Error al agregar al carrito: " . mysqli_error($this->conexion));
        }

        return true;
    }

    public function limpiarCarrito() {
        $query = "DELETE FROM carrito";
        $resultado = mysqli_query($this->conexion, $query);
        if (!$resultado) {
            die("Error al limpiar el carrito: " . mysqli_error($this->conexion));
        }
        return true;
    }

    public function obtenerCarrito() {
        $query = "SELECT producto FROM carrito";
        $resultado = mysqli_query($this->conexion, $query);
        if (!$resultado) {
            die("Error al obtener el carrito: " . mysqli_error($this->conexion));
        }
        $carrito = [];
        while ($row = mysqli_fetch_assoc($resultado)) {
            $carrito[] = $row['producto'];
        }
        return $carrito;
    }
}
?>

