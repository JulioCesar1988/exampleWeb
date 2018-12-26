<?php
class Index extends TwigView {
  public function show($usuario_logeado) {
    echo self::getTwig()->render('index.html.twig' ,array('usuario_logeado' => $usuario_logeado));
  }
}
