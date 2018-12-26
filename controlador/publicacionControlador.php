<?php
include_once ('model/Publicacion.php');
include_once ('vista/List_publicaciones.php');
class publicacionControlador {
    private static $instance;
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __construct() {

    }
    // muestra formulario de login
  	public function index_publicaciones(){
      $publicacion = new Publicacion();
      // publicaciones de mis de los usuarios que sigo .
      $id_usuario = 1;
      $publicaciones = $publicacion->allPublicaciones($id_usuario);
      $v = new List_publicaciones();
      $usuario_logeado = $_SESSION["mail"];
      $v->show($usuario_logeado,$publicaciones);

  	}

 // insertar un mensaje de un usauario
public function insert_publicacion($mensaje, $fecha_publicacion, $publico, $usuario_id){
  $publicacion = new Publicacion();
  $publicaciones = $publicacion->insert_publicacion($mensaje, $fecha_publicacion, $publico, $usuario_id);
   header("Location: http://localhost/benitez/index.php?action=publicacion_index");

}




}

?>
