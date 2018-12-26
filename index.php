
<?php
session_start();
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
// "0Db40C162172562D6ACF";
//Twig
require_once('vendor/autoload.php');
require_once('vista/TwigView.php');
// Controladores
require_once('controlador/publicacionControlador.php');
require_once('controlador/usuarioControlador.php');
// Vista
require_once 'vista/Index.php';
require_once 'vista/Login.php';
require_once 'vista/Add_publicacion.php';
require_once 'vista/List_publicaciones.php';

if (isset($_REQUEST["action"])) {
			$action = $_GET["action"]; // tomo la accion solicitada
switch ($action) {
  case 'index':
      $usuario_logeado = $_SESSION["mail"];
      $v = new Index();
      $v->show($usuario_logeado);
      break;
  case 'login':
        $l = new Login();
        $l->show();
        break;
  case 'cerrar_sesion':
            // Cerramos la sesion
            usuarioControlador::getInstance()->cerrar_sesion();
            break;
  case 'verificar_usuario':
        // obetnemos los datos .
        $mail = $_POST['email'];
        $pwd = $_POST['pwd'];
        echo "usuario -> ".$mail;
        echo "Clave -> ".$pwd;
        // Se los enviamos al controlador .
        usuarioControlador::getInstance()->verificar_usuario($mail,$pwd);
        break;
	 case 'insert_mensaje':
				$mensaje = $_POST['mensaje'];
				$fecha_publicacion = date('Y-m-d');
				$publico = isset($_POST['publico']) ? 1 : 0;
        $u = new Usuario();
				  $usuario_logeado = $_SESSION["mail"];
				$usuario_id = $u->getID($usuario_logeado);
				publicacionControlador::getInstance()->insert_publicacion($mensaje, $fecha_publicacion, $publico, $usuario_id);
				break;
    case 'publicacion_index':
        publicacionControlador::getInstance()->index_publicaciones();
        break;
    case 'add_publicacion':
        $p = new Add_publicacion();
        $usuario_logeado = $_SESSION["mail"];
        $p->show($usuario_logeado);
        break;
}
}
else {
   header("Location: http://localhost/benitez/index.php?action=login");

}



?>
