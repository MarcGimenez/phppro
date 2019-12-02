<?php
//Projecte de Marc Gimenez i Sergio Gutierrez
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


<?php
require_once('classes/Usuario.php');

if (!isset($_POST['eemail'])){
    echo "<p class='error'>No hi ha informació de sessió. Tornaràs a l'inici en 3 segons...</p>"
    ?>
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../index.html">
    <?php
}else{
    $us_l = new Usuario($_POST['eemail'], $_POST['passwordd'], "ficheros/registrar.txt");
    echo "Usuari correcte<br>";
    echo "Usuari: ".$_POST['eemail']." <br>";
    $res = $us_l->verifyexists();

    if ($res==2){
        echo "<p  class='ben'>Benvingut ".$_SESSION['eemail']."</p>";
        echo "<p class='ben'>En 3 segons seràs redirigit a la botiga.</p>";
        ?>
        <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=tienda.php">
        <?php
    }
    else {
        echo "<p class='noe'> Usuari no trobat o contrasenya incorrecte, tornant a Registre.</p>";
        ?>
        <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../registrar.html">
        <?php
    }
}
?>
</body>
</html>