<?php

require('classes/Usuario.class.php');
require('classes/Fabricante.class.php');
require('classes/Estoque.class.php');
require('classes/Movimentacao.class.php');

class Main{
    public function __construct()
    {
        $objUsuario = new Usuario;
        $obFabricante = new Fabricante;
        $obEstoque = new Estoque;
        $objMovimentacao = new Movimentacao;

        switch($_SERVER['argv'][1]){
            case 'gravaUsuario':
                echo "Grava usuario:";
                $this->gravaUsuario($objUsuario);
                break;
            case 'editaUsuario':
                $this->editaUsuario($objUsuario);
                break;
            default:
            echo "Não existe a funcionalidade $_SERVER['argv'][1]";
        }

    }

    public function gravaUsuario($objUsuario){
        $dados = $this->tratarDados();
         $objUsuario->setDados($dados);
         if($objUsuario->gravaDados()){
            echo "Deu Certo!!!!! Usuario cadastrado";   
        }
    }

    public function editaUsuario($objUsuario){
        $dados = $this->tratarDados();
        $objUsuario->setDados($dados);
        if($objUsuario->gravaDados()){
            echo "Deu Certo!!!!! Usuario editado";
        }
    }

    public function tratarDados(){
        $args = explode( '.' . $_SERVER['args'][2]);
        foreach ($args as $valor){
            $arg = explode('='. $valor);
             $dados[$args[0]] = $arg[1];
            }
        return $dados;
    }

    public function __destruct(){
        echo "FIM DO PROGRAMA";
    }
}

new Main;

/* 
Tabelas:
itens
estoque
itens_no_estoque
movimentacoes
usuarios
fabricantes
*/