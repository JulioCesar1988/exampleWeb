<?php
include 'model/Usuario.php';



function login_verificar($email , $clave)
{
   // usamos el modelo para verificar la existencia del usuario y cargar la sesion
   $usuario = Usuario() new;
   $email = $_POST["email"];
   $clave = $_POST["clave"];

  if ($usuario->verificar_login($email,$clave)) {
    // Cargamos la sesion
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['clave'] = $clave;
   // Lo enviamos a las publicaciones
    header("Location: localhost/repo_git/controlador/publicacionControlador/index_publicacion");
  }else{
     // informamos que no se puedo realizar la sesion


  }




}






?>
