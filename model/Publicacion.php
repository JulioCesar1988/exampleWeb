
<?php
require_once 'conexion.php';


public allPublicacion(){
	$query = $pdo->query('SELECT mensaje FROM publicacion;');
	return $query->fetchAll();
}



public insert($mensaje,$fecha_publicacion,$publico,$idUsuario){
$sql = "INSERT INTO publicacion ($mensaje,$fecha_publicacion,$publico,$idUsuario) VALUES (?,?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$mensaje, $fecha_publicacion,$publico,$idUsuario]);
}




?>
