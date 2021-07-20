<?php

class Conexion{
    public static function conectar() {
        $Link = new PDO("mysql:host=localhost:3308;dbname=id17237207_pdophp","id17237207_progra4","<7[&ektU2-Ic%*+\$");
        //var_dump($Link);
       return $Link;
    }
}

/*$a = new Conexion();
$a ->conectar();
 * 
 * 
 * 
class Conexion{
    public static function conectar() {
        $Link = new PDO("mysql:host=localhost:3308;dbname=pdophp","root","");
        //var_dump($Link);
       return $Link;
    }
}

 */
