<?php
require_once('classes/Productos.php');
//$imatges = array("bamba1"=>60, "bamba2"=>80, "bamba3"=>50, "camisa1"=>45, "camisa2"=>30, "camisa3"=>25,"pant1"=>60,
//         "pant2"=>70, "pant3"=>50, "jeans1"=>65, "jeans2"=>90, "jeans3"=>50, "blazer1"=>90, "blazer2"=>45);
$p = new Productos();
$imatges = $p->getProductos();

$_SESSION['numero']=0;


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
<a href='Destruir_sesion.php'><p>Salir </p></a>
    <h1 class="titulop">BOTIGA DE ROBA CLOT </h1>
    <a href="registrar_producte.html"><p>Registra un producte</p></a>
    <?php
    session_start();
        if (!isset($_SESSION['eemail'])){
            echo "<p class='error'>No hi ha informació de sessió. Tornaràs a l'inici en 3 segons...</p>"
            ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../index.html">
     <?php
    }if (isset($_SESSION['eemail'])){
    
    echo "<p class='entrada'>Benvingut ".$_SESSION['eemail'].", aquesta es la pàgina de la botiga.</p>";
    if(empty($_SESSION['productes'])){
        echo "<p>No hi ha res a la cistella</p>";
    }else{
        $count = 0;
        foreach ($_SESSION['productes'] as $producte) {
            $count += $producte['cantidad'];
        }
        echo "<a href='carrito.php'><p>Anar a la Cistella (".$count.")</p></a>";
    }
    ?>
    <form action="carrito.php" method="POST">
    <?php
        echo "<ul>";
        foreach ($imatges as $imatge => $preu) {
            echo "<li class='estilito'><input type='checkbox' name='productos[]' value='$imatge,$preu'><img src='../img/$imatge.jpg' onerror='this.src=\"../img/img1.jpg\"' width='100px'/><span class='texto'>$imatge</span>    <span class='preu'>$preu €</span><span class='cantidad'> cantidad: <input type='text' name='cantidad_$imatge' value=1 ></span></li>";
    }  
      
    ?>
        <input type="submit" value="Comprar">
    </form>
    <?php
    }
    ?>

</body>
</html>


