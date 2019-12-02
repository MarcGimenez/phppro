<?php
    require_once('classes/Productos.php');

    if (isset($_POST['nomProducte']) && isset($_POST['preuProducte'])){
        $p = new Productos;
        $p -> saveProducto($_POST['nomProducte'],$_POST['preuProducte']);
        echo "Producte creat amb èxit.";
        echo "<a href='tienda.php'><p>Torna a la botiga</p></a>";
        echo "<a href='registrar_producte.html'><p>Registra un altre producte</p></a>";
    }

?>