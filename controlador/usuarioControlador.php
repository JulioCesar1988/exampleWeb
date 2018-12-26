<?php
include_once ('model/Usuario.php');
class usuarioControlador {
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
	public function login(){
		$view = new Login();
		$view->login();
	}
  // Cerramos la sesion del usuario .
  public function cerrar_sesion(){
     // remove all session variables
     session_unset();
     // destroy the session
     session_destroy();
     header("Location: http://localhost/benitez/index.php?action=login");

  }

   public function list_usuarios(){
        $u = new usuario();
        $usuarios =   $u->allUsuarios();
        var_dump($usuarios);
    	}


  	// muestra formulario de login
  	public function verificar_usuario($mail,$pwd){
       // Parametros que llegaron .
       echo "Hola soy el controladro : ";
       echo "Email ->".$mail;
       echo "Pwd ->".$pwd;
       $usuario = new Usuario();
       if ($usuario->verificar_usuario($mail,$pwd) > 0) {
         // ...
           session_start();
           $_SESSION["mail"] = $mail;
           $_SESSION["clave"] = $pwd;
           header("Location: http://localhost/benitez/index.php?action=publicacion_index");
       }
       else{
         //  Volvemos al login  e informamos que los datos no son validos.
          header("Location: http://localhost/benitez/index.php?action=login");
       }


  	}











}

?>
