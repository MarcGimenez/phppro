<?php
class Productos {
    
    public function getProductos(){
        
        $fa=fopen(__DIR__."/../ficheros/productos.txt","r+");
        while ($linea = fgets($fa)){
            $campos = explode(',',$linea);
            $productos[$campos[0]] = $campos[1];
        }
        fclose($fa);

        return $productos;
    }
    public function saveProducto($nombre,$precio){
        $fa=fopen(__DIR__."/../ficheros/productos.txt","a+");
        fwrite($fa,"\n".$nombre.",".$precio);
        fclose($fa);
    }
}