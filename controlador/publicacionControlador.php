<?php
require_once 'model/Publicacion';
require_once 'model/Usuario';

$publicacion = new Publicacion();
$publicaciones = $publicacion->allPublicacion();
// Agregamos un mensaje  ( publicacion )
public add_mensaje () {
 // parametros que recibimos
$mensaje = $_POST["mesaje"];
$fecha_publicacion = $date = date('Y-m-d H:i:s');
$publico = $_POST["publico"];
// Necesitamos obtener el Id del Usuario que lo esta cargardo
$usuario = new Usuario();
$usuario_logeado = $_SESSION["email"];
$idUsuario = usuario->getIdUsuario($usuario_logeado);
// Llamos al modelo publicacion para hacer el insert
$publicacion = new Publicacion();
if ($publicacion->insert($mensaje,$fecha_publicacion,$publico,$idUsuario)) {
     echo "El mensaje se pudo dar de alta exitosamente";
}
{echo "No se puede dar de alta es mensaje lo sentimos";}

}


public index_publicacion(){
  // Obtenemos todas las publicaciones publicas para el usuario que se logeo
 $publicacion = new Publicacion();
 $publicaciones = $publicacion->allPublicacion();
 // Tenemos que instanciar la vista  En twig para enviar los datos y que pueda hacer el render
 $view = new  Show_Publicaciones();
 // publicaciones a mostrar y tambien el usario logeado para hacer el render
 $view->show( $publicaciones);

}



?>
