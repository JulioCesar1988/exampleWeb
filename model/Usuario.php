<?php
include_once 'model/Connection.php';
class Usuario {
  private function connection() {

    $connection = new Connection();
    $connection = $connection->getConnection();
    return $connection;
  }

  // ID por mail .
  public function getID($mail){
    $query = $this->connection()->prepare("SELECT id FROM usuario WHERE usuario.mail = ?");
    $query->execute(array($mail));
    return $query->fetch()['id'];
  }

    // Buscamos un usuario dado el email.
    public function verificar_usuario($mail,$clave){
      echo "verificando usuario";
      $query = $this->connection()->prepare("SELECT * FROM usuario where (mail = ? AND clave = ? )");
      $query->execute(array($mail,$clave));
      return $query->fetch();

    }

}
