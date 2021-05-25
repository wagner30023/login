<?php

require './Model/Usuario.php';

class UsuarioDao
{
    private $debug = true;
    private $dir = "Arquivo";

    public function Cadastrar(Usuario $usuario)
    {
        try {
            $filename = $usuario->getEmail() . ".txt";
            if (!$this->VerificaArquivoExiste) {
                //  realiza o cadastro
                $diretorioCompleto = $this->dir . "/" . $filename;

                $fopen = fopen($diretorioCompleto, "w");

                $str = "{$usuario->getNome()};
                        {$usuario->getEmail()};
                        {$usuario->getSenha()};
                        {$usuario->getData()};";
                if(!fwrite($fopen, $str)){
                    fclose($fopen);
                    return 1; // usuario cadastrado com sucesso
                }else{
                    fclose($fopen);
                    return -10; // erro ao tentar cadastrar
                }
                
            } else {
                return -1; // usuario já cadastrado
            }
            $filename = $usuario->getEmail() . ".txt";
        } catch (Exception $ex) {
            if ($this->debug) {
                echo $ex->getMessage();
            }
        }
    }

    private function VerificaArquivoExiste(string $nomeArquivo)
    {
        $diretorioCompleto = $this->dir . "/" . $nomeArquivo;
        // verifica se o diretório existe. 
        if (file_exists($diretorioCompleto)) {
            return true;
        } else {
            return false;
        }
    }
}
