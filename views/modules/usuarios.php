<?php
if(isset($_SESSION)){
    if(!$_SESSION["usuarioActivo"]){
        header("location:ingresar_error");
        exit();
    } 
}else {
      header("location:ingresar_error");
        exit();  
    }


 $usuarios = new MvcController();
 $usuarios->borrarUsuariosController();
 $usuarios->editarUsuarioController();        
 ?>




<!DOCTYPE html>
<html lang="es">

<head>
    <title>Usuarios</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->
      
      <!-- Google font-->     <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
      <!-- waves.css -->
      <link rel="stylesheet" href="pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="icon/font-awesome/css/font-awesome.min.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="icon/icofont/css/icofont.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.css">
  </head>
  <body>
      <?php
       include "navegacion.php";
      ?>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Basic table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Usuarios registrados</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                        <li><i class="fa fa-trash close-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Usuarios</th>
                                                                <th>Contraseña</th>
                                                                <th>Correo Electrónico</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $usuarios->vistaUsuariosController();
                                                                ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
    
                                                        if(isset($_GET["action"])){

                                                            if ($_GET["action"] == "eliminado_ok") {
                                                                    echo "Usuario eliminado correctamente";
                                                            }elseif ($_GET["action"] == "eliminado_error") {
                                                                    echo "Ocurrío un error al eliminar el Usuario";
                                                            }elseif ($_GET["action"] == "actulizado_ok") {
                                                                    echo "Usuario actulizado correctamente";
                                                            }elseif ($_GET["action"] == "actulizado_error") {
                                                                    echo "Ocurrío un error al actulizar el usuario";        
                                                            }elseif ($_GET["action"] == "ingresar_ok") {
                                                                    echo "Bienvenido"; 
                                                            }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Basic table card end -->

                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <script type="text/javascript" src="js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- waves js -->
    <script src="pages/waves/js/waves.min.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="js/modernizr/modernizr.js "></script>
    <!-- Custom js -->
    <script src="js/pcoded.min.js"></script>
    <script src="js/vertical-layout.min.js "></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</body>

</html>
