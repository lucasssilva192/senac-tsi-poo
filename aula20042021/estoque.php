<?php

require('classes/Usuario.class.php');
require('classes/Fabricante.class.php');
require('classes/Estoque.class.php');
require('classes/Movimentacao.class.php');

class Main{

    private $objUsuario;
    //private $objFabricante;
    //private $objEstoque;
    //private $objMovimentacao;

    public function __construct()
    {
        echo "COMECO DO PROGRAMA \n";

        $this->objUsuario = new Usuario;
        $this->objFabricante = new Fabricante;
        $this->objEstoque = new Estoque;
        $this->objMovimentacao = new Movimentacao;
        $this->verificaSeExistArg(1);
        $this->executaOperacao($_SERVER['argv'][1]);
       
    }

    private function gravaUsuario(){
        $dados = $this->tratarDados();
         $this->objUsuario->setDados($dados);
         if($this->objUsuario->gravarDados()){
            echo "Deu Certo!!!!! Usuario cadastrado";   
        }
    }

private function executaOperacao(string $operacao){
    switch($operacao){
        case 'gravaUsuario':
            $this->gravaUsuario();
            break;
        case 'editaUsuario':
            $this->editaUsuario();
            break;
        case 'apagaUsuario':
            $this->apagaUsuario();
        default:
        echo "Não existe a funcionalidade {$_SERVER['argv'][1]} \n";
    }

}

    private function verificaSeExistArg(int $numArg){

        if (!isset($_server['argv'][$numArg] ) ){
            if($numArg == 1 ){
                $msg = "ERRO: PARA UTILIZAR O PROGRAMA DIGITE PHP ESTOQUE.PHP [OPERACAO]";
            } else{
                $msg =  "ERRO: PARA UTILIZAR O PROGRAMA DIGITE PHP ESTOQUE.PHP [OPERACAO] [DADO=VALOR, DADO2=VALOR2}";
            }
        }
    }

    private function apagaUsuario(){
        $dados = $this->tratarDados();
        $this->objUsuario->setDados($dados);

        if ($this->objUsuario->delete()){
            return '\n Usuario apago com sucesso \n';
        }else{
            return '\n Errro ao tentar apagar usuario \n';
        }
    }

    private function listaUsuario(){
        $lista = $this->objUsuario->getAll();
        foreach ($lista as $usuario){
            echo "{$usuario['id']} \t {$usuario['cpf']} \n {$usuario['nome']} ";
        }
    }

    private function editaUsuario(){
        $dados = $this->tratarDados();
        $this->objUsuario->setDados($dados);
        if($this->objUsuario->gravarDados()){
            echo "Deu Certo!!!!! Usuario editado";
        }
    }

    private function tratarDados(){
        $this->verificaSeExistArg(1);
        $args = explode( ',', $_SERVER['args'][2]);
        foreach ($args as $valor){
            $arg = explode('=', $valor);
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