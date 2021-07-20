<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	static public function pagina(){	

		include "views/template.php";

	}

	#ENLACES
	#-------------------------------------

	static public function enlacesPaginasController(){

		if(isset( $_GET['action'])){

			$enlaces = $_GET['action'];

		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}
        
        //#registro Usuarios
        public static function registroUsuarioController(){ 
            if(
            isset($_POST["nombre"]) &&  
            isset($_POST["password"]) &&
            isset($_POST["email"])
            ){
                if(!empty($_POST["nombre"]) && !empty($_POST["password"])&& !empty($_POST["email"])){
                   if(preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/',$_POST["nombre"]) &&
                      preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',$_POST["email"]) &&     
                      preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/',$_POST["password"])){
                                         /*segurida*/
                        //$password = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                      $password = password_hash($_POST["password"], PASSWORD_DEFAULT);      
                      /*-------------*/
                      $datos = array(
                          "nombre" => $_POST["nombre"],
                          /*parte de segurida le pasa la variable para guardarla*/
                          "password" => $password,
                          "email" => $_POST["email"]
                           );
                      $respuesta = Datos::registroUsuariosModel($datos,"usuarios");
                      if($respuesta == "success"){
                            echo '<script>
                                    window.location.href="registro_ok";
                                    </script>';
                          
                      }else {
                          echo '<script>
                                    window.location.href="registro_error";
                                    </script>';
                          
                      }
                    }
                }                     
        }
    }


 
    #----------------------
    #vistas usuarios
    public static function vistaUsuariosController(){
        $respuesta = Datos::vistaUsuarioModel("usuarios");
        foreach ($respuesta as $key => $value){
            echo'
              <tr>
                      <td>'.$value["nombre"].'</td>
                      <td>*******</td>
                      <td>'.$value["email"].'</td>
                      <td>
                        <a href="editar&idEditar='.$value["id"].'">
                            <button class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                Editar
                            </button>
                        <a/>
                      </td>
                      <td>
                        <a href="usuarios&idBorrar='.$value["id"].'">
                            <button class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                Borrar
                            </button>
                        <a/>
                     </td>
              </tr>
            ';
        }
    }
    #Elimar usuario
    public static function borrarUsuariosController() {
        if(isset($_GET["idBorrar"])){
            if(!empty($_GET["idBorrar"])){
                   if(preg_match('/^[0-9]{1,20}$/',$_GET["idBorrar"])){
                          $datos = $_GET["idBorrar"];
                          $respuesta = Datos::borrarUsuarioModel($datos, "usuarios");
                            if( $respuesta == "success"){
                                echo '<script>
                                    window.location.href="eliminado_ok";
                                    </script>';
                               
                            } else {
                                  echo '<script>
                                    window.location.href="eliminado_error";
                                    </script>';
                                
                            }
                        }
                    }
            }
         }


    #editar usuario
    public static function editarUsuarioController() {
        if(isset($_GET["idEditar"])){
             if(!empty($_GET["idEditar"])){
                   if(preg_match('/^[0-9]{1,20}$/',$_GET["idEditar"])){
                        $datos = $_GET["idEditar"];
                        $respuesta = Datos::editarUsuarioModel($datos, "usuarios");
                        echo '
                            <input type="hidden" name="id" value="'.$respuesta["id"].'"required>      
                            <br/>
                            <input type="text" placeholder="Usuario" name="nombre" class="form-control id="nombre_registro" value="'.$respuesta["nombre"].'" required>
                            <br/>
                            <input type="password" placeholder="Contraseña" class="form-control name="password"  required>
                            <br/>
                            <input type="email" placeholder="Email" name="email" class="form-control id="email_registro" value="'.$respuesta["email"].'" required>
                            <br/>
                            <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Enviar">
                        ';  
                    }
                }
            }
        }


            
            
    public static function actualizarUsuarioController() {
         if(
                isset($_POST["id"]) && 
                isset($_POST["nombre"]) &&  
                isset($_POST["password"]) &&
                isset($_POST["email"])
                ){
                   if(!empty($_POST["id"])&& !empty($_POST["nombre"]) && !empty($_POST["password"])&& !empty($_POST["email"])){
                     if(preg_match('/^[0-9]{1,20}$/',$_POST["id"])&&
                        preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/',$_POST["nombre"]) &&
                        preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',$_POST["email"]) &&     
                        preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/',$_POST["password"])){
                          //$password = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                          $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                          $datos = array(
                                "id" => $_POST["id"],
                                "nombre" => $_POST["nombre"],
                                "password" => $password,
                                "email" => $_POST["email"]
                                 );
                          $respuesta = Datos::actulizarUsuarioModel($datos,"usuarios");
                          if($respuesta == "success"){
                              echo '<script>
                                    window.location.href="actulizado_ok";
                                    </script>';
                          }else {
                                echo '<script>
                                    window.location.href="actulizado_error";
                                    </script>';
                          }
                      }
                  }
          }
      }
              

       #ingreso de usuario

    public static function ingresarUsuarioController() {
        if(isset($_POST["nombre"])&&
            isset($_POST["password"]) ){
               if(!empty($_POST["nombre"]) && !empty($_POST["password"])){
                   if(preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/',$_POST["nombre"]) &&
                           preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/',$_POST["password"])){
                            $password= $_POST["password"];
                            $datos = array(
                                "nombre" => $_POST["nombre"],
                                "password" => $password
                             );
                            $respuesta = Datos::ingresarUsuarioModel($datos,"usuarios");
                            if($respuesta["nombre"] == $datos["nombre"] && 
                                    password_verify($_POST["password"], $respuesta["password"]))
                                    {$_SESSION["usuarioActivo"] = true;
                                   echo '<script>
                                    window.location.href="ingresar_ok";
                                    </script>';
                            }else {
                                echo '<script>
                                    window.location.href="ingresar_error";
                                    </script>';
                                    
                          }
                }else {
                    echo '<script>
                            window.location.href="ingresar_error_invalido";
                          </script>';
                }
           } else {
                echo '<script>
                            window.location.href="ingresar_error_vacio";
                          </script>';
            
           }
                           
       }
    }
    
    
    
    
    #--------------------------------------------
    #VALIDAR USUARIOS
    public static function validarUsuariosController($datos) {
       $respuesta = 0;
        if(!empty($datos) ){
         if(preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/', $datos) || 
            preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $datos )){
               $respuesta = Datos::validarUsuarioModel($datos);
               if($respuesta[0] > 0){
                   $respuesta = 1;
               } else {
                   $respuesta = 0;
               }
         }
      
    }
    return $respuesta;
    }
    

}

?>