<?php
require_once "config.php"; 
require_once "CarritoDAO.php";

$carritoDAO = new CarritoDAO($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["producto"])) {
    $producto = $_POST["producto"];
    $carritoDAO->agregarAlCarrito($producto);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Carrito de Compras</h1>
        <img src="img/1.png">
        <br>
        <!-- Botón para ver el carrito -->
        <button onclick="showCart()">Ver Carrito</button>
        
        <!-- Productos disponibles -->
        <div class="products">
            <h2>Productos Disponibles</h2>
            <ul>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <li>Coca cola<button type="submit" name="producto" value="Coca cola">Añadir al Carrito</button></li>
                    <li>Leche<button type="submit" name="producto" value="Leche">Añadir al Carrito</button></li>
                    <li>Pan<button type="submit" name="producto" value="Pan">Añadir al Carrito</button></li>
                </form>
            </ul>
        </div>
        
        <!-- Carrito -->
        <div id="cart" class="cart" style="display: none;">
            <h2>Carrito</h2>
            <ul id="cart-items"></ul>
            <button onclick="clearCart()">Limpiar Carrito</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
