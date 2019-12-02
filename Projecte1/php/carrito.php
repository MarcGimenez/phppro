<?php
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <title>Botiga</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<style>
    img {
        margin: 5px;
    }
</style>
<body>
<a href='Destruir_sesion.php'><p>Tancar </p></a>

<?php
session_start();
if (!isset($_SESSION['eemail'])){
    echo "<p>No hi ha informació de sessió. Tornaràs a l'inici en 3 segons...</p>"
    ?>
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../index.html">
    <?php
}else{
    if(!isset($_SESSION['productes'])){
        $_SESSION['productes'] = array();
    }
    
    echo "<p class='cistella'><h1>Cistella de la compra de: ".$_SESSION['eemail']."</h1></br>";
    echo "<a href='tienda.php'><p>Seguir comprant </p></a>";
    if(isset($_POST['eliminar'])){
        unset($_SESSION['productes'][$_POST['eliminar']]);
    }elseif(isset($_POST['productos'])){
        foreach($_POST['productos'] as $linea){
            $campos = explode(',',$linea);
            if(!isset($_SESSION['productes'][$campos[0]])){
                $_SESSION['productes'][$campos[0]] = [
                    'preu' => $campos[1],
                    'cantidad' =>  (int)$_POST['cantidad_'.$campos[0]],
                ];
            }else {
                $_SESSION['productes'][$campos[0]]['cantidad']+=$_POST['cantidad_'.$campos[0]];
            }
        }
    }
    if(empty($_SESSION['productes'])){
        echo "<p class='error'>Señor/a no hay productos, vamos a la tienda</p>";
        ?>
        <META HTTP-EQUIV="REFRESH" CONTENT="4;URL=tienda.php">
        <?php
    }else{
        $_SESSION['numero'] = 0;
        foreach ($_SESSION['productes'] as $producte) {
            $_SESSION['numero'] += (int)$producte['preu']*(int)$producte['cantidad'];
        }

        echo "Productes </br>";
        echo "</br>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Imatge</th>";
        echo "<th>Nom</th>";
        echo "<th>Preu</th>";
        echo "<th>Quantitat</th>";
        echo "<th>Total producte</th>";
        echo "<th>Eliminar</th>";
        echo "</tr>";
        foreach ($_SESSION['productes'] as $name => $producte) {

           
            echo "<tr>";
            ?><td class='caja'><img src='../img/<?php echo $name?>.jpg' onerror='this.src="../img/img1.jpg"' width='100px'/><?php
            echo "<td class='caja'>".$name."</td>";
            echo "<td class='caja'>".$producte['preu']."</td>";
            echo "<td class='caja'>".$producte['cantidad']."</td>";
            echo "<td class='caja'>".(int)$producte['preu']*(int)$producte['cantidad']."</td>";
            echo "<td class='caja'><form action='carrito.php' method='POST'> <input type='hidden' name='eliminar' value='$name' >  <input type='submit' value='Eliminar'>
            </form></td>";
           
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan=5 class='red' align='right'>TOTAL: ".$_SESSION['numero']."€</td>";
        echo "</tr>";
        echo "</table>";

        echo "</br>";
    }

        
}

?>
<a href="finalitzar_compra.php" ><input type="button" name="" value="Finalitzar compra" id="boton1">

</body>
</html>
  
  
