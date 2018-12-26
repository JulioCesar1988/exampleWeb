<?php
class Add_publicacion extends TwigView {
  public function show($usuario_logeado) {
    echo self::getTwig()->render('Add_publicacion.html.twig', array('usuario_logeado' => $usuario_logeado));
  }
}
