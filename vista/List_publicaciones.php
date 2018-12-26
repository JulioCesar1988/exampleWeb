<?php
class List_publicaciones extends TwigView {
  public function show($usuario_logeado,$publicaciones) {
    echo self::getTwig()->render('List_publicaciones.html.twig', array('usuario_logeado' => $usuario_logeado ,'publicaciones' => $publicaciones));
  }
}
