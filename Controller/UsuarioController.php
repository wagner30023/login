<?php

require './DAL/UsuarioDAO.php';

class UsuarioController
{
    private $usuarioDao;

    public function __construct()
    {
      $this->usuarioDao = new UsuarioDAO();  
    }

    public function Cadastrar(Usuario $usuario)
    {   
        if(strlen($usuario->getNome()) > 3 && strlen($usuario->getSenha()) >= 7 
        && strpos($usuario->getEmail(),"@") > 0){
            return $this->usuarioDao->Cadastrar($usuario);
        }else {
            return -2;
        }
    }

}
