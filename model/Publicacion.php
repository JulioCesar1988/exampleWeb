<?php
include_once 'model/Connection.php';
class Publicacion {
  private function connection() {
    $connection = new Connection();
    $connection = $connection->getConnection();
    return $connection;
  }

  // Listado de mensajes: una vez que el usuario haya ingresado a la aplicación (debe iniciar sesión),
	// se podrán listar los mensajes ordenadas por fecha descendente.
	// Tenga en cuenta que el usuario podrá ver los mensajes públicos o los mensajes de los usuarios a quien sigue
  public function allPublicaciones($id_usuario){
    $query = $this->connection()->prepare("SELECT publicacion.mensaje AS mensaje ,
			                                            publicacion.fecha_publicacion AS fecha_publicacion ,
																									usuario.mail AS usuario_id,
																									publicacion.publico AS publico
			 																		  FROM publicacion INNER JOIN usuario ON (publicacion.usuario_id = usuario.id )
																					  WHERE usuario_id IN ( SELECT usuario_seguidor_id
																																	FROM usuario_sigue_a_usuario
																																	WHERE usuario_id = $id_usuario) AND publico = 1");
    $query->execute();
    return $query->fetchAll();
  }

public function insert_publicacion($mensaje, $fecha_publicacion, $publico, $usuario_id){
	 $query = $this->connection()->prepare("INSERT INTO publicacion (mensaje,fecha_publicacion,publico,usuario_id) VALUES (?,?,?,?)");
	$query->execute(array($mensaje, $fecha_publicacion, $publico, $usuario_id));
}


}



?>
