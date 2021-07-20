<?php
require_once "conexion.php";
class Datos extends Conexion{
    
    public static function registroUsuariosModel($datos,$tabla) {
        $stnt= Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,password,email)VALUES(:nombre,:password, :email)");
        $stnt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stnt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stnt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        if($stnt->execute()){
            return "success";
        }else{
            return $stnt->errorInfo();
        }
    }
    
    public static function vistaUsuarioModel($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM $tabla");
        $stmt ->execute();
        return $stmt->fetchAll();
    }
    
    #Eliminar usuario
    public static function borrarUsuarioModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stnt->bindParam(":id", $datos, PDO::PARAM_INT);

        if($stnt->execute()){
            return "success";
        }else{
           $stnt->errorInfo();
        }
    }
    #ediar usuario
    public static function editarUsuarioModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("SELECT id,nombre,email FROM $tabla WHERE id= :id");
        $stnt->bindParam(":id", $datos, PDO::PARAM_INT);
        $stnt->execute();
        return $stnt->fetch();
    }
    
    public static function actulizarUsuarioModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,password = :password,email= :email WHERE id = :id");
        $stnt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stnt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stnt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stnt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        if($stnt->execute()){
            return "success";
        }else{
            return $stnt->errorInfo();
        }
    }
    
    public static function ingresarUsuarioModel($datos, $tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT nombre, password FROM $tabla WHERE nombre = :nombre");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt ->execute();
        return $stmt->fetch();
    }
    
    
    public static function validarUsuarioModel($datos) {
        $stmt = Conexion::conectar()->prepare("SELECT count(nombre) FROM usuarios WHERE nombre = :nombre || email = :nombre");
        $stmt->bindParam(":nombre",$datos, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        
    }
 }
