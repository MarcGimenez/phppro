
<?php
session_start();

$dir='ficheros/compras/'.$_SESSION['eemail'];
if(!is_dir($dir)){
    mkdir($dir, 0755, true);
}
$fichero = $dir.'/'.date("YmdHis").'.txt';
$fa=fopen( $fichero,'a+');

foreach ($_SESSION['productes'] as $name => $producte) {
    fwrite($fa,$name." preu: ".$producte['preu']." quantitat: ".$producte['cantidad']."\n");
}
fwrite($fa,"\nPrecio total de la compra: ".$_SESSION['numero']);
fclose($fa);

unset($_SESSION['productes']);
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
<p class='bye'>COMPRA FINALITZADA.</p>
<a href='tienda.php'><p>Seguir comprant </p></a>
<a href='Destruir_sesion.php'><p>Salir </p></a>
</body>
</html>