
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

$us = new Usuario($_POST['user'],  $_POST['passwordd'], "ficheros/registrar.txt");
echo "Usuario Registrado<br>";
echo "Usuario: ".$_POST['user']." <br>";
echo "Contra: ". $_POST['passwordd']." <br>";
$res = $us->verifyexists();
if ($res!==0){
    echo "<p class='en'>L'usuari ja existeix.</p>";
    echo "<p class='ena'>Tornant a Registre...</p>";
    ?>
     <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=../registrar.html">
    <?php
 }
else{
     $us->writeusers();
     echo "<p class='find'>Usuari registrat!</p>";
     echo "<p class='ye'>Tornant a inici de sessió.</p>";
     ?>
     <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=../index.html">
     <?php
     
 }

?>
</body>
</html>